@extends('layouts.app')
@section('title', 'Branches')
@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-black font-condensed">Branches</h1>
    <a href="{{ route('admin.branches.create') }}" class="bg-[#e8192c] text-white px-4 py-2 rounded-lg font-bold">Add Branch</a>
</div>
<div class="bg-[#17171d] border border-white/10 rounded-2xl overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-[#23232e] text-[#a0a0b0]">
            <tr><th class="text-left px-6 py-3">Name</th><th>Slug</th><th>Location</th><th>Brand Type</th><th>Active</th><th>Actions</th></tr>
        </thead>
        <tbody>
            @foreach($branches as $b)
            <tr class="border-t border-white/5">
                <td class="px-6 py-3">{{ $b->name }}</td>
                <td class="px-6 py-3">{{ $b->slug }}</td>
                <td class="px-6 py-3">{{ $b->location }}</td>
                <td class="px-6 py-3 capitalize">{{ $b->brand_type }}</td>
                <td class="px-6 py-3">{{ $b->is_active ? 'Yes' : 'No' }}</td>
                <td class="px-6 py-3 flex gap-2">
                    <a href="{{ route('admin.branches.edit', $b) }}" class="text-blue-400">Edit</a>
                    <form method="POST" action="{{ route('admin.branches.destroy', $b) }}" class="inline" onsubmit="return confirm('Delete?')">@csrf @method('DELETE')<button class="text-red-400">Delete</button></form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
