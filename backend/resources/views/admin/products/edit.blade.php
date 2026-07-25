@extends('layouts.app')
@section('title', 'Edit Product')
@section('content')
<div class="max-w-3xl mx-auto bg-[#17171d] border border-white/10 rounded-2xl p-8">
    <h1 class="text-2xl font-black font-condensed mb-6">Edit Product: {{ $product->name }}</h1>
    <form method="POST" action="{{ route('admin.products.update', $product) }}">
        @csrf @method('PUT')
        <div class="grid md:grid-cols-3 gap-4 mb-4">
            <div>
                <label class="block text-sm mb-1">Category</label>
                <select name="category_id" class="w-full p-3 rounded bg-[#0c0c0e] border border-white/10">
                    <option value="">Select Category</option>
                    @if(isset($categories))
                        @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ ($product->category_id == $cat->id) ? 'selected' : '' }}>{{ $cat->name }} ({{ $cat->brand }})</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div>
                <label class="block text-sm mb-1">Brand Tag</label>
                <select name="brand_tag" class="w-full p-3 rounded bg-[#0c0c0e] border border-white/10">
                    <option value="">Select</option>
                    <option value="cheez" {{ ($product->brand_tag == 'cheez') ? 'selected' : '' }}>Cheez</option>
                    <option value="madchef" {{ ($product->brand_tag == 'madchef') ? 'selected' : '' }}>Madchef</option>
                    <option value="both" {{ ($product->brand_tag == 'both') ? 'selected' : '' }}>Both</option>
                </select>
            </div>
            <div>
                <label class="block text-sm mb-1">Branch (Optional)</label>
                <select name="branch_id" class="w-full p-3 rounded bg-[#0c0c0e] border border-white/10">
                    <option value="">Select Branch</option>
                    @if(isset($branches))
                        @foreach($branches as $b)
                        <option value="{{ $b->id }}" {{ ($product->branch_id == $b->id) ? 'selected' : '' }}>{{ $b->name }} [{{ $b->brand_type }}]</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-sm mb-1">Name</label>
                <input type="text" name="name" value="{{ $product->name }}" class="w-full p-3 rounded bg-[#0c0c0e] border border-white/10" required>
            </div>
            <div>
                <label class="block text-sm mb-1">Slug</label>
                <input type="text" name="slug" value="{{ $product->slug }}" class="w-full p-3 rounded bg-[#0c0c0e] border border-white/10" required>
            </div>
        </div>
        <div class="grid md:grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-sm mb-1">Category Text (optional)</label>
                <input type="text" name="category" value="{{ $product->category }}" class="w-full p-3 rounded bg-[#0c0c0e] border border-white/10">
            </div>
            <div>
                <label class="block text-sm mb-1">Price</label>
                <input type="number" step="0.01" name="price" value="{{ $product->price }}" class="w-full p-3 rounded bg-[#0c0c0e] border border-white/10" required>
            </div>
        </div>
        <label class="block text-sm mb-1">Description</label>
        <textarea name="description" rows="3" class="w-full p-3 rounded bg-[#0c0c0e] border border-white/10 mb-4">{{ $product->description }}</textarea>

        <div class="flex items-center mb-4">
            <input type="checkbox" name="is_available" id="is_available" class="mr-2 w-4 h-4" {{ $product->is_available ? 'checked' : '' }}>
            <label for="is_available">Available</label>
        </div>

        <hr class="border-white/10 my-6">
        <h3 class="text-lg font-bold mb-3">Product Variations</h3>
        <div id="variationsContainer">
            @if($product->variations && $product->variations->count() > 0)
                @foreach($product->variations as $i => $v)
                <div class="variation-row grid md:grid-cols-5 gap-3 mb-3 items-center">
                    <input type="text" value="{{ $v->size_name }}" disabled class="p-2 rounded bg-[#23232e] border border-white/10 text-sm">
                    <input type="number" step="0.01" value="{{ $v->price }}" disabled class="p-2 rounded bg-[#23232e] border border-white/10 text-sm">
                    <div class="text-xs">{{ $v->is_available ? 'Active' : 'Disabled' }} {{ $v->reason ? '('.$v->reason.')' : '' }}</div>
                    <a href="{{ route('admin.products.variations.edit', [$product, $v]) }}" class="text-blue-400 text-sm">Edit</a>
                    <form method="POST" action="{{ route('admin.products.variations.destroy', [$product, $v]) }}" onsubmit="return confirm('Delete?')">
                        @csrf @method('DELETE')
                        <button class="text-red-400 text-sm">Delete</button>
                    </form>
                </div>
                @endforeach
            @else
                <p class="text-sm text-[#a0a0b0]">No variations yet. Add below.</p>
            @endif
        </div>
        <h4 class="text-sm font-bold mt-4 mb-2">Add / Update Variations</h4>
        <div class="grid md:grid-cols-4 gap-3 mb-3">
            <input type="text" name="variations[0][size_name]" placeholder="Size" class="p-2 rounded bg-[#0c0c0e] border border-white/10">
            <input type="number" step="0.01" name="variations[0][price]" placeholder="Price" class="p-2 rounded bg-[#0c0c0e] border border-white/10">
            <div class="flex items-center"><input type="checkbox" name="variations[0][is_available]" checked class="mr-2"><label>Active</label></div>
            <input type="text" name="variations[0][reason]" placeholder="Disable reason" class="p-2 rounded bg-[#0c0c0e] border border-white/10">
        </div>
        <button type="button" onclick="addVariationRow()" class="text-sm bg-[#23232e] px-3 py-1 rounded mb-4 hover:bg-[#2a2a36]">+ Add Size</button>

        <button type="submit" class="w-full bg-[#e8192c] text-white py-3 rounded-lg font-bold hover:bg-[#b01020]">Update Product</button>
    </form>
</div>
<script>
    let varCount = 1;
    function addVariationRow() {
        const container = document.getElementById('variationsContainer');
        const row = document.createElement('div');
        row.className = 'grid md:grid-cols-4 gap-3 mb-3';
        row.innerHTML = `
            <input type="text" name="variations[${varCount}][size_name]" placeholder="Size" class="p-2 rounded bg-[#0c0c0e] border border-white/10">
            <input type="number" step="0.01" name="variations[${varCount}][price]" placeholder="Price" class="p-2 rounded bg-[#0c0c0e] border border-white/10">
            <div class="flex items-center"><input type="checkbox" name="variations[${varCount}][is_available]" checked class="mr-2"><label>Active</label></div>
            <input type="text" name="variations[${varCount}][reason]" placeholder="Disable reason" class="p-2 rounded bg-[#0c0c0e] border border-white/10">
        `;
        // Append before the Add button / or after existing rows; simpler: append at end of container
        container.appendChild(row);
        varCount++;
    }
</script>
@endsection
