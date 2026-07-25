@extends('layouts.app')
@section('title', 'Add Product')
@section('content')
<div class="max-w-3xl mx-auto bg-[#17171d] border border-white/10 rounded-2xl p-8">
    <h1 class="text-2xl font-black font-condensed mb-6">Add Product</h1>
    <form method="POST" action="{{ route('admin.products.store') }}" id="productForm">
        @csrf
        <div class="grid md:grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-sm mb-1">Name</label>
                <input type="text" name="name" class="w-full p-3 rounded bg-[#0c0c0e] border border-white/10" required>
            </div>
            <div>
                <label class="block text-sm mb-1">Slug</label>
                <input type="text" name="slug" class="w-full p-3 rounded bg-[#0c0c0e] border border-white/10" required>
            </div>
        </div>

        <div class="grid md:grid-cols-3 gap-4 mb-4">
            <div>
                <label class="block text-sm mb-1">Category (Dropdown)</label>
                <select name="category_id" class="w-full p-3 rounded bg-[#0c0c0e] border border-white/10">
                    <option value="">Select Category</option>
                    @if(isset($categories))
                        @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }} ({{ $cat->brand }})</option>
                        @endforeach
                    @endif
                </select>
                <input type="hidden" name="category" value="" id="categoryHidden">
            </div>
            <div>
                <label class="block text-sm mb-1">Brand Tag</label>
                <select name="brand_tag" class="w-full p-3 rounded bg-[#0c0c0e] border border-white/10">
                    <option value="">Select Brand</option>
                    <option value="cheez">Cheez</option>
                    <option value="madchef">Madchef</option>
                    <option value="both">Both</option>
                </select>
            </div>
            <div>
                <label class="block text-sm mb-1">Branch (Optional)</label>
                <select name="branch_id" class="w-full p-3 rounded bg-[#0c0c0e] border border-white/10">
                    <option value="">Select Branch</option>
                    @if(isset($branches))
                        @foreach($branches as $b)
                        <option value="{{ $b->id }}">{{ $b->name }} [{{ $b->brand_type }}]</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-sm mb-1">Base Price</label>
                <input type="number" step="0.01" name="price" class="w-full p-3 rounded bg-[#0c0c0e] border border-white/10" required>
            </div>
            <div>
                <label class="block text-sm mb-1">Image Path</label>
                <input type="text" name="image_path" class="w-full p-3 rounded bg-[#0c0c0e] border border-white/10" placeholder="images/pizza/example.webp">
            </div>
        </div>

        <label class="block text-sm mb-1">Description</label>
        <textarea name="description" rows="3" class="w-full p-3 rounded bg-[#0c0c0e] border border-white/10 mb-4"></textarea>

        <div class="flex items-center mb-4">
            <input type="checkbox" name="is_available" id="is_available" class="mr-2 w-4 h-4" checked>
            <label for="is_available">Available</label>
        </div>

        <hr class="border-white/10 my-6">
        <h3 class="text-lg font-bold mb-3">Product Variations (Sizes / Prices)</h3>
        <div id="variationsContainer">
            <div class="variation-row grid md:grid-cols-4 gap-3 mb-3">
                <input type="text" name="variations[0][size_name]" placeholder="Size (e.g. Small)" class="p-2 rounded bg-[#0c0c0e] border border-white/10">
                <input type="number" step="0.01" name="variations[0][price]" placeholder="Price" class="p-2 rounded bg-[#0c0c0e] border border-white/10">
                <div class="flex items-center"><input type="checkbox" name="variations[0][is_available]" checked class="mr-2"><label>Active</label></div>
                <input type="text" name="variations[0][reason]" placeholder="Disable reason (optional)" class="p-2 rounded bg-[#0c0c0e] border border-white/10">
            </div>
        </div>
        <button type="button" onclick="addVariationRow()" class="text-sm bg-[#23232e] px-3 py-1 rounded mb-6 hover:bg-[#2a2a36]">+ Add Another Size</button>

        <button type="submit" class="w-full bg-[#e8192c] text-white py-3 rounded-lg font-bold hover:bg-[#b01020]">Save Product</button>
    </form>
</div>

<script>
    let varCount = 1;
    function addVariationRow() {
        const container = document.getElementById('variationsContainer');
        const row = document.createElement('div');
        row.className = 'variation-row grid md:grid-cols-4 gap-3 mb-3';
        row.innerHTML = `
            <input type="text" name="variations[${varCount}][size_name]" placeholder="Size (e.g. Large)" class="p-2 rounded bg-[#0c0c0e] border border-white/10">
            <input type="number" step="0.01" name="variations[${varCount}][price]" placeholder="Price" class="p-2 rounded bg-[#0c0c0e] border border-white/10">
            <div class="flex items-center"><input type="checkbox" name="variations[${varCount}][is_available]" checked class="mr-2"><label>Active</label></div>
            <input type="text" name="variations[${varCount}][reason]" placeholder="Disable reason (optional)" class="p-2 rounded bg-[#0c0c0e] border border-white/10">
        `;
        container.appendChild(row);
        varCount++;
    }
    // Sync category dropdown to hidden field
    document.querySelector('select[name="category_id"]').addEventListener('change', function() {
        const selected = this.options[this.selectedIndex];
        document.getElementById('categoryHidden').value = selected ? selected.text.split(' ')[0] : '';
    });
</script>
@endsection
