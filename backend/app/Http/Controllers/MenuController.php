<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class MenuController extends Controller
{
    public function index()
    {
        $products = Product::where('is_available', true)->orderBy('name')->get();
        return view('menu.index', compact('products'));
    }

    public function category($category)
    {
        $products = Product::where('category', $category)->where('is_available', true)->get();
        return view('menu.category', compact('products', 'category'));
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('menu.show', compact('product'));
    }
}
