@extends('layouts.app')
@section('title', 'Employees')
@section('content')
<h1 class="text-2xl font-black font-condensed mb-6">Branch Employees</h1>
@if($branch)
<p class="text-sm text-[#a0a0b0] mb-4">Branch: {{ $branch->name }} — Only your branch staff shown.</p>
@endif

<form method="POST" action="{{ url('branch-manager/store-employee') }}" class="bg-[#17171d] border border-white/10 rounded-2xl p-6 mb-6">
    @csrf
    <div class="grid md:grid-cols-4 gap-3 mb-3">
        <input type="text" name="name" placeholder="Employee Name" class="p-2 rounded bg-[#0c0c0e] border border-white/10" required>
        <input type="text" name="contact" placeholder="Contact" class="p-2 rounded bg-[#0c0c0e] border border-white/10" required>
        <select name="role" class="p-2 rounded bg-[#0c0c0e] border border-white/10" required>
            <option value="">Select Role</option>
            <option value="kitchen_staff">Kitchen Staff</option>
            <option value="chef">Chef</option>
            <option value="waiter">Waiter</option>
            <option value="cashier">Cashier</option>
            <option value="delivery_staff">Delivery Staff</option>
            <option value="cleaner">Cleaner</option>
            <option value="security">Security</option>
            <option value="supervisor">Supervisor</option>
        </select>
        <input type="date" name="join_date" class="p-2 rounded bg-[#0c0c0e] border border-white/10">
    </div>
    <div class="flex items-center gap-4 mb-4">
        <div class="flex items-center"><input type="checkbox" name="is_active" checked class="mr-2"><label>Active</label></div>
    </div>
    <button type="submit" class="bg-[#e8192c] text-white px-4 py-2 rounded font-bold">Add Employee</button>
</form>

<div class="bg-[#17171d] border border-white/10 rounded-2xl overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-[#23232e] text-[#a0a0b0]"><tr><th class="px-4 py-3">Name</th><th>Contact</th><th>Role</th><th>Join Date</th><th>Active</th></tr></thead>
        <tbody>
            @if($employees && $employees->count() > 0)
                @foreach($employees as $emp)
                <tr class="border-t border-white/5">
                    <td class="px-4 py-2">{{ $emp->name }}</td>
                    <td class="px-4 py-2">{{ $emp->contact }}</td>
                    <td class="px-4 py-2 capitalize">{{ $emp->role }}</td>
                    <td class="px-4 py-2">{{ $emp->join_date }}</td>
                    <td class="px-4 py-2">{{ $emp->is_active ? 'Yes' : 'No' }}</td>
                </tr>
                @endforeach
            @else
                <tr><td colspan="5" class="px-4 py-3 text-sm text-[#a0a0b0]">No employees.</td></tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
