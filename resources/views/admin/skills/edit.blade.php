@extends('layouts.admin')

@section('title', 'Edit Skill — ' . $skill->name)

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    
    <div class="flex items-center justify-between border-b border-[#E8E5DC] pb-4">
        <div>
            <h1 class="font-serif text-3xl font-bold text-[#1C1917]">Edit Technical Competency</h1>
            <p class="text-sm text-[#57534E] mt-1">Editing <span class="font-semibold text-[#1C1917]">{{ $skill->name }}</span></p>
        </div>
        <a href="{{ route('admin.skills.index') }}" class="text-xs font-mono text-[#78716C] hover:text-[#1C1917]">
            &larr; Back to Skills
        </a>
    </div>

    <form action="{{ route('admin.skills.update', $skill) }}" method="POST" class="bg-white rounded-2xl border border-[#E8E5DC] p-6 sm:p-10 space-y-6 shadow-xs">
        @csrf
        @method('PUT')

        <div class="space-y-6">
            <div>
                <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Skill / Technology Name *</label>
                <input type="text" name="name" value="{{ old('name', $skill->name) }}" required class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
            </div>

            <div>
                <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Classification Category *</label>
                <select name="category" required class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
                    <option value="programming_language" {{ old('category', $skill->category) == 'programming_language' ? 'selected' : '' }}>Programming Language</option>
                    <option value="framework" {{ old('category', $skill->category) == 'framework' ? 'selected' : '' }}>Framework &amp; Component System</option>
                    <option value="database" {{ old('category', $skill->category) == 'database' ? 'selected' : '' }}>Database &amp; Storage</option>
                    <option value="tools" {{ old('category', $skill->category) == 'tools' ? 'selected' : '' }}>DevOps, Cloud &amp; Tools</option>
                </select>
            </div>

            <div>
                <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Proficiency Percentage (1 - 100) *</label>
                <input type="number" name="proficiency" value="{{ old('proficiency', $skill->proficiency) }}" min="1" max="100" required class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
            </div>

            <div>
                <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Material Symbol Icon Identifier</label>
                <input type="text" name="icon" value="{{ old('icon', $skill->icon) }}" class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
            </div>

            <div>
                <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Display Sort Order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $skill->sort_order) }}" class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
            </div>
        </div>

        <div class="pt-4 border-t border-[#F4F2EB] flex justify-end gap-3">
            <a href="{{ route('admin.skills.index') }}" class="px-5 py-2.5 rounded-lg border border-[#D5D1C6] text-xs font-mono text-[#57534E] hover:bg-[#F4F2EB]">
                Cancel
            </a>
            <button type="submit" class="px-6 py-2.5 rounded-lg bg-[#1C1917] text-[#FAF9F6] font-medium text-xs font-mono hover:bg-[#322F2D] transition shadow-xs flex items-center gap-2">
                <span class="material-symbols-outlined text-sm">save</span>
                <span>Update Skill</span>
            </button>
        </div>
    </form>

</div>
@endsection
