@extends('layouts.admin')

@section('title', 'Experience Manager')

@section('content')
<div class="space-y-6">

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b border-[#E8E5DC] pb-4">
        <div>
            <h1 class="font-serif text-3xl font-bold text-[#1C1917]">Work Experience Timeline</h1>
            <p class="text-sm text-[#57534E] mt-1">
                Maintain your chronology of roles, companies, engineering achievements, and technical contributions.
            </p>
        </div>
        <div>
            <a href="{{ route('admin.experiences.create') }}" class="px-4 py-2.5 rounded-lg bg-[#1C1917] text-[#FAF9F6] text-xs font-mono font-medium hover:bg-[#322F2D] transition flex items-center gap-2 shadow-xs">
                <span class="material-symbols-outlined text-sm">add_circle</span>
                <span>Add Experience</span>
            </a>
        </div>
    </div>

    <!-- Experience Table -->
    <div class="bg-white rounded-2xl border border-[#E8E5DC] overflow-hidden shadow-xs">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-[#FAF9F6] border-b border-[#E8E5DC] text-xs font-mono uppercase text-[#78716C]">
                    <tr>
                        <th class="px-6 py-4">Role &amp; Company</th>
                        <th class="px-6 py-4">Duration</th>
                        <th class="px-6 py-4">Location</th>
                        <th class="px-6 py-4">Order</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#F4F2EB]">
                    @forelse($experiences as $exp)
                        <tr class="hover:bg-[#FAF9F6]/60 transition">
                            <td class="px-6 py-4">
                                <div class="font-semibold text-[#1C1917] flex items-center gap-2">
                                    <span>{{ $exp->role }}</span>
                                    @if($exp->is_current)
                                        <span class="px-2 py-0.5 rounded text-[10px] font-mono bg-emerald-50 text-emerald-800 border border-emerald-200">
                                            Current
                                        </span>
                                    @endif
                                </div>
                                <div class="text-xs text-[#8F6A3B] font-medium mt-0.5">
                                    {{ $exp->company }}
                                </div>
                            </td>
                            <td class="px-6 py-4 text-xs font-mono text-[#57534E]">
                                {{ $exp->start_date }} — {{ $exp->end_date }}
                            </td>
                            <td class="px-6 py-4 text-xs text-[#78716C]">
                                {{ $exp->location ?? 'N/A' }}
                            </td>
                            <td class="px-6 py-4 text-xs font-mono text-[#78716C]">
                                {{ $exp->sort_order }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end space-x-2">
                                    <a href="{{ route('admin.experiences.edit', $exp) }}" class="p-1.5 rounded hover:bg-[#F4F2EB] text-[#57534E] hover:text-[#1C1917]" title="Edit">
                                        <span class="material-symbols-outlined text-base">edit</span>
                                    </a>
                                    <form action="{{ route('admin.experiences.destroy', $exp) }}" method="POST" onsubmit="return confirm('Are you sure you wish to delete this experience record?');" class="inline">
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
                            <td colspan="5" class="px-6 py-8 text-center text-[#78716C] italic font-mono text-xs">
                                No experience entries recorded yet. Click "Add Experience" to add one.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
