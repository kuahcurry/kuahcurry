@extends('layouts.admin')

@section('title', 'Add Experience')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    
    <div class="flex items-center justify-between border-b border-[#E8E5DC] pb-4">
        <div>
            <h1 class="font-serif text-3xl font-bold text-[#1C1917]">Add Work Experience</h1>
            <p class="text-sm text-[#57534E] mt-1">Record a new professional position in your career timeline.</p>
        </div>
        <a href="{{ route('admin.experiences.index') }}" class="text-xs font-mono text-[#78716C] hover:text-[#1C1917]">
            &larr; Back to Experience
        </a>
    </div>

    <form action="{{ route('admin.experiences.store') }}" method="POST" class="bg-white rounded-2xl border border-[#E8E5DC] p-6 sm:p-10 space-y-6 shadow-xs">
        @csrf

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Role / Job Title *</label>
                <input type="text" name="role" value="{{ old('role') }}" required placeholder="e.g. Lead Software Architect" class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
            </div>

            <div>
                <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Company / Organization *</label>
                <input type="text" name="company" value="{{ old('company') }}" required placeholder="e.g. Lumina Cloud Infrastructure" class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
            </div>

            <div>
                <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Company URL</label>
                <input type="url" name="company_url" value="{{ old('company_url') }}" placeholder="https://example.com" class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
            </div>

            <div>
                <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Location</label>
                <input type="text" name="location" value="{{ old('location') }}" placeholder="e.g. San Francisco, CA (Hybrid)" class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
            </div>

            <div>
                <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Start Date *</label>
                <input type="text" name="start_date" value="{{ old('start_date') }}" required placeholder="e.g. 2023 or Jan 2023" class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
            </div>

            <div>
                <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">End Date</label>
                <input type="text" name="end_date" value="{{ old('end_date', 'Present') }}" placeholder="e.g. Present or Dec 2024" class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
            </div>

            <div class="sm:col-span-2 flex items-center space-x-3">
                <input type="checkbox" id="is_current" name="is_current" value="1" {{ old('is_current') ? 'checked' : '' }} class="rounded border-[#D6D3D1] text-[#1C1917] focus:ring-[#1C1917]">
                <label for="is_current" class="text-xs font-mono text-[#1C1917] font-semibold cursor-pointer">
                    This is my current role
                </label>
            </div>

            <div class="sm:col-span-2">
                <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Role Summary Description</label>
                <textarea name="description" rows="3" placeholder="Overview of department, team scope, and high-level responsibilities..." class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none leading-relaxed">{{ old('description') }}</textarea>
            </div>

            <div class="sm:col-span-2">
                <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Key Achievements &amp; Highlights</label>
                <textarea name="highlights" rows="4" placeholder="Enter each bullet point achievement on a new line..." class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none leading-relaxed">{{ old('highlights') }}</textarea>
                <p class="text-xs text-[#78716C] font-mono mt-1">One accomplishment per line.</p>
            </div>

            <div class="sm:col-span-2">
                <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Technologies Used</label>
                <input type="text" name="technologies" value="{{ old('technologies') }}" placeholder="Laravel, PHP 8.4, Tailwind CSS, PostgreSQL, Redis, Docker" class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
                <p class="text-xs text-[#78716C] font-mono mt-1">Separate technologies with commas.</p>
            </div>

            <div>
                <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Display Sort Order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
            </div>
        </div>

        <div class="pt-4 border-t border-[#F4F2EB] flex justify-end gap-3">
            <a href="{{ route('admin.experiences.index') }}" class="px-5 py-2.5 rounded-lg border border-[#D5D1C6] text-xs font-mono text-[#57534E] hover:bg-[#F4F2EB]">
                Cancel
            </a>
            <button type="submit" class="px-6 py-2.5 rounded-lg bg-[#1C1917] text-[#FAF9F6] font-medium text-xs font-mono hover:bg-[#322F2D] transition shadow-xs flex items-center gap-2">
                <span class="material-symbols-outlined text-sm">save</span>
                <span>Save Experience</span>
            </button>
        </div>
    </form>

</div>
@endsection
