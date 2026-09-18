@extends('layouts.admin')

@section('title', 'Add New Project')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    
    <div class="flex items-center justify-between border-b border-[#E8E5DC] pb-4">
        <div>
            <h1 class="font-serif text-3xl font-bold text-[#1C1917]">Create New Project</h1>
            <p class="text-sm text-[#57534E] mt-1">Add a new software project with Git repository and live website links.</p>
        </div>
        <a href="{{ route('admin.projects.index') }}" class="text-xs font-mono text-[#78716C] hover:text-[#1C1917]">
            &larr; Back to Projects
        </a>
    </div>

    <form action="{{ route('admin.projects.store') }}" method="POST" class="bg-white rounded-2xl border border-[#E8E5DC] p-6 sm:p-10 space-y-6 shadow-xs">
        @csrf

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div class="sm:col-span-2">
                <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Project Title *</label>
                <input type="text" name="title" value="{{ old('title') }}" required placeholder="e.g. Aura Distributed Orchestrator" class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
            </div>

            <div>
                <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Slug (URL identifier)</label>
                <input type="text" name="slug" value="{{ old('slug') }}" placeholder="auto-generated if empty" class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
            </div>

            <div>
                <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Category *</label>
                <input type="text" name="category" value="{{ old('category', 'Distributed Systems & Backend') }}" required placeholder="e.g. Full-Stack Web Application" class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
            </div>

            <div class="sm:col-span-2">
                <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Tagline / Subtitle</label>
                <input type="text" name="tagline" value="{{ old('tagline') }}" placeholder="A concise, compelling technical tagline" class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
            </div>

            <div class="sm:col-span-2">
                <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Detailed Description *</label>
                <textarea name="description" rows="4" required placeholder="Describe the technical challenges, architecture choices, and results..." class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none leading-relaxed">{{ old('description') }}</textarea>
            </div>

            <div class="sm:col-span-2">
                <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Thumbnail Image URL</label>
                <input type="text" name="thumbnail" value="{{ old('thumbnail') }}" placeholder="https://..." class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
            </div>

            <div>
                <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Git Repository URL</label>
                <input type="url" name="github_url" value="{{ old('github_url') }}" placeholder="https://github.com/username/repository" class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
            </div>

            <div>
                <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Live Demo / Website URL</label>
                <input type="url" name="website_url" value="{{ old('website_url') }}" placeholder="https://project.example.com" class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
            </div>

            <div class="sm:col-span-2">
                <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Technologies Used</label>
                <input type="text" name="technologies" value="{{ old('technologies') }}" placeholder="Laravel, PHP 8.4, Redis, Tailwind CSS, Material Web, Docker" class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
                <p class="text-xs text-[#78716C] font-mono mt-1">Separate technologies with commas.</p>
            </div>

            <div class="flex items-center space-x-3 pt-2">
                <input type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }} class="rounded border-[#D6D3D1] text-[#1C1917] focus:ring-[#1C1917]">
                <label for="is_featured" class="text-xs font-mono text-[#1C1917] font-semibold cursor-pointer">
                    Highlight as Featured Project
                </label>
            </div>

            <div>
                <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Display Sort Order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
            </div>
        </div>

        <div class="pt-4 border-t border-[#F4F2EB] flex justify-end gap-3">
            <a href="{{ route('admin.projects.index') }}" class="px-5 py-2.5 rounded-lg border border-[#D5D1C6] text-xs font-mono text-[#57534E] hover:bg-[#F4F2EB]">
                Cancel
            </a>
            <button type="submit" class="px-6 py-2.5 rounded-lg bg-[#1C1917] text-[#FAF9F6] font-medium text-xs font-mono hover:bg-[#322F2D] transition shadow-xs flex items-center gap-2">
                <span class="material-symbols-outlined text-sm">save</span>
                <span>Save Project</span>
            </button>
        </div>
    </form>

</div>
@endsection
