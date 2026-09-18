@extends('layouts.admin')

@section('title', 'Education Manager')

@section('content')
<div class="space-y-6">

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b border-[#E8E5DC] pb-4">
        <div>
            <h1 class="font-serif text-3xl font-bold text-[#1C1917]">Education &amp; Academic Credentials</h1>
            <p class="text-sm text-[#57534E] mt-1">
                Manage degrees, academic certifications, honors, and research coursework.
            </p>
        </div>
        <div>
            <a href="{{ route('admin.education.create') }}" class="px-4 py-2.5 rounded-lg bg-[#1C1917] text-[#FAF9F6] text-xs font-mono font-medium hover:bg-[#322F2D] transition flex items-center gap-2 shadow-xs">
                <span class="material-symbols-outlined text-sm">add_circle</span>
                <span>Add Education</span>
            </a>
        </div>
    </div>

    <!-- Education Table -->
    <div class="bg-white rounded-2xl border border-[#E8E5DC] overflow-hidden shadow-xs">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-[#FAF9F6] border-b border-[#E8E5DC] text-xs font-mono uppercase text-[#78716C]">
                    <tr>
                        <th class="px-6 py-4">Degree &amp; Field</th>
                        <th class="px-6 py-4">Institution</th>
                        <th class="px-6 py-4">Years</th>
                        <th class="px-6 py-4">Grade / Honors</th>
                        <th class="px-6 py-4">Order</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#F4F2EB]">
                    @forelse($education as $edu)
                        <tr class="hover:bg-[#FAF9F6]/60 transition">
                            <td class="px-6 py-4">
                                <div class="font-semibold text-[#1C1917]">{{ $edu->degree }}</div>
                                <div class="text-xs text-[#78716C] font-mono">{{ $edu->field_of_study }}</div>
                            </td>
                            <td class="px-6 py-4 text-xs font-medium text-[#8F6A3B]">
                                {{ $edu->institution }}
                            </td>
                            <td class="px-6 py-4 text-xs font-mono text-[#57534E]">
                                {{ $edu->start_year }} — {{ $edu->end_year }}
                            </td>
                            <td class="px-6 py-4 text-xs">
                                @if($edu->grade)
                                    <span class="px-2 py-0.5 rounded text-[11px] font-mono bg-[#FAF9F6] border border-[#E8E5DC] text-[#1C1917] font-semibold">
                                        {{ $edu->grade }}
                                    </span>
                                @else
                                    <span class="text-[#78716C] font-mono">&mdash;</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-xs font-mono text-[#78716C]">
                                {{ $edu->sort_order }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end space-x-2">
                                    <a href="{{ route('admin.education.edit', $edu) }}" class="p-1.5 rounded hover:bg-[#F4F2EB] text-[#57534E] hover:text-[#1C1917]" title="Edit">
                                        <span class="material-symbols-outlined text-base">edit</span>
                                    </a>
                                    <form action="{{ route('admin.education.destroy', $edu) }}" method="POST" onsubmit="return confirm('Are you sure you wish to delete this education entry?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1.5 rounded hover:bg-rose-50 text-rose-600" title="Delete">
                                            <span class="material-symbols-outlined text-base">delete</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-[#78716C] italic font-mono text-xs">
                                No education records found. Click "Add Education" to add one.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
