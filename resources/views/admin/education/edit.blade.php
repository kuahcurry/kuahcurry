@extends('layouts.admin')

@section('title', 'Edit Education — ' . $education->degree)

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    
    <div class="flex items-center justify-between border-b border-[#E8E5DC] pb-4">
        <div>
            <h1 class="font-serif text-3xl font-bold text-[#1C1917]">Edit Academic Record</h1>
            <p class="text-sm text-[#57534E] mt-1">Editing <span class="font-semibold text-[#1C1917]">{{ $education->degree }}</span> at {{ $education->institution }}</p>
        </div>
        <a href="{{ route('admin.education.index') }}" class="text-xs font-mono text-[#78716C] hover:text-[#1C1917]">
            &larr; Back to Education
        </a>
    </div>

    <form action="{{ route('admin.education.update', $education) }}" method="POST" class="bg-white rounded-2xl border border-[#E8E5DC] p-6 sm:p-10 space-y-6 shadow-xs">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Degree / Certification *</label>
                <input type="text" name="degree" value="{{ old('degree', $education->degree) }}" required class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
            </div>

            <div>
                <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Field of Study *</label>
                <input type="text" name="field_of_study" value="{{ old('field_of_study', $education->field_of_study) }}" required class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
            </div>

            <div class="sm:col-span-2">
                <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Institution / University *</label>
                <input type="text" name="institution" value="{{ old('institution', $education->institution) }}" required class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
            </div>

            <div>
                <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Start Year *</label>
                <input type="text" name="start_year" value="{{ old('start_year', $education->start_year) }}" required class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
            </div>

            <div>
                <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">End Year *</label>
                <input type="text" name="end_year" value="{{ old('end_year', $education->end_year) }}" required class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
            </div>

            <div class="sm:col-span-2">
                <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Grade / Latin Honors</label>
                <input type="text" name="grade" value="{{ old('grade', $education->grade) }}" class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
            </div>

            <div class="sm:col-span-2">
                <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Description &amp; Senior Capstone</label>
                <textarea name="description" rows="3" class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none leading-relaxed">{{ old('description', $education->description) }}</textarea>
            </div>

            <div class="sm:col-span-2">
                <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Achievements, Honors &amp; Societies</label>
                <textarea name="achievements" rows="3" class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none leading-relaxed">{{ old('achievements', is_array($education->achievements) ? implode("\n", $education->achievements) : '') }}</textarea>
                <p class="text-xs text-[#78716C] font-mono mt-1">One item per line.</p>
            </div>

            <div>
                <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Display Sort Order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $education->sort_order) }}" class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
            </div>
        </div>

        <div class="pt-4 border-t border-[#F4F2EB] flex justify-end gap-3">
            <a href="{{ route('admin.education.index') }}" class="px-5 py-2.5 rounded-lg border border-[#D5D1C6] text-xs font-mono text-[#57534E] hover:bg-[#F4F2EB]">
                Cancel
            </a>
            <button type="submit" class="px-6 py-2.5 rounded-lg bg-[#1C1917] text-[#FAF9F6] font-medium text-xs font-mono hover:bg-[#322F2D] transition shadow-xs flex items-center gap-2">
                <span class="material-symbols-outlined text-sm">save</span>
                <span>Update Education</span>
            </button>
        </div>
    </form>

</div>
@endsection
