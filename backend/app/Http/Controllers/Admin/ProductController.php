<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Branch;
use App\Models\Category;
use App\Models\ProductVariation;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('branch', 'categoryModel', 'variations')->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::where('is_active', true)->get();
        $branches = Branch::where('is_active', true)->get();
        return view('admin.products.create', compact('categories', 'branches'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:products',
            'category' => 'nullable|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'branch_id' => 'nullable|exists:branches,id',
            'brand_tag' => 'nullable|string|in:cheez,madchef,both',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image_path' => 'nullable|string',
        ]);

        $data = $request->all();
        $data['is_available'] = $request->has('is_available');

        $product = Product::create($data);

        // Handle multiple size/price variations
        if ($request->has('variations')) {
            foreach ($request->input('variations', []) as $var) {
                if (!empty($var['size_name']) && isset($var['price'])) {
                    ProductVariation::create([
                        'product_id' => $product->id,
                        'size_name' => $var['size_name'],
                        'price' => $var['price'],
                        'is_available' => isset($var['is_available']) ? true : false,
                        'reason' => $var['reason'] ?? null,
                    ]);
                }
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Product added with variations.');
    }

    public function edit(Product $product)
    {
        $categories = Category::where('is_active', true)->get();
        $branches = Branch::where('is_active', true)->get();
        $product->load('variations');
        return view('admin.products.edit', compact('product', 'categories', 'branches'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:products,slug,' . $product->id,
            'category' => 'nullable|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'branch_id' => 'nullable|exists:branches,id',
            'brand_tag' => 'nullable|string|in:cheez,madchef,both',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        $data = $request->all();
        $data['is_available'] = $request->has('is_available');
        $product->update($data);

        // Update variations
        if ($request->has('variations')) {
            // Clear existing or merge; here we replace by deleting and recreating
            ProductVariation::where('product_id', $product->id)->delete();
            foreach ($request->input('variations', []) as $var) {
                if (!empty($var['size_name']) && isset($var['price'])) {
                    ProductVariation::create([
                        'product_id' => $product->id,
                        'size_name' => $var['size_name'],
                        'price' => $var['price'],
                        'is_available' => isset($var['is_available']) ? true : false,
                        'reason' => $var['reason'] ?? null,
                    ]);
                }
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Product updated.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted.');
    }

    // Manage variations individually
    public function variationEdit(ProductVariation $variation)
    {
        return view('admin.products.variation_edit', compact('variation'));
    }

    public function variationUpdate(Request $request, ProductVariation $variation)
    {
        $request->validate([
            'size_name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'is_available' => 'nullable',
            'reason' => 'nullable|string',
        ]);
        $variation->update([
            'size_name' => $request->input('size_name'),
            'price' => $request->input('price'),
            'is_available' => $request->has('is_available'),
            'reason' => $request->input('reason'),
        ]);
        return redirect()->route('admin.products.edit', $variation->product_id)->with('success', 'Variation updated.');
    }

    public function variationDestroy(ProductVariation $variation)
    {
        $productId = $variation->product_id;
        $variation->delete();
        return redirect()->route('admin.products.edit', $productId)->with('success', 'Variation deleted.');
    }
}
