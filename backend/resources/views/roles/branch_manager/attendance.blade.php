@extends('layouts.app')
@section('title', 'Branch Manager — Attendance')
@section('content')
<h1 class="text-2xl font-black font-condensed mb-6">Attendance</h1>
<p class="text-sm text-[#a0a0b0] mb-4">Update daily attendance for your branch employees.</p>
<div class="bg-[#17171d] border border-white/10 rounded-2xl overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-[#23232e] text-[#a0a0b0]"><tr><th class="px-4 py-3">Name</th><th>Role</th><th>Join Date</th><th>Active</th></tr></thead>
        <tbody>
            @if(isset($attendance) && $attendance->count() > 0)
                @foreach($attendance as $a)
                <tr class="border-t border-white/5">
                    <td class="px-4 py-2">{{ $a->name }}</td>
                    <td class="px-4 py-2 capitalize">{{ $a->role }}</td>
                    <td class="px-4 py-2">{{ $a->join_date }}</td>
                    <td class="px-4 py-2">{{ $a->is_active ? 'Yes' : 'No' }}</td>
                </tr>
                @endforeach
            @else
                <tr><td colspan="4" class="px-4 py-3 text-sm text-[#a0a0b0]">No attendance records.</td></tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
