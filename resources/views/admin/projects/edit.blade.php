@extends('layouts.admin')

@section('title', 'Edit Project — ' . $project->title)

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    
    <div class="flex items-center justify-between border-b border-[#E8E5DC] pb-4">
        <div>
            <h1 class="font-serif text-3xl font-bold text-[#1C1917]">Edit Project</h1>
            <p class="text-sm text-[#57534E] mt-1">Editing <span class="font-semibold text-[#1C1917]">{{ $project->title }}</span></p>
        </div>
        <a href="{{ route('admin.projects.index') }}" class="text-xs font-mono text-[#78716C] hover:text-[#1C1917]">
            &larr; Back to Projects
        </a>
    </div>

    <form action="{{ route('admin.projects.update', $project) }}" method="POST" class="bg-white rounded-2xl border border-[#E8E5DC] p-6 sm:p-10 space-y-8 shadow-xs">
        @csrf
        @method('PUT')

        <!-- Bilingual Content: 2 Columns -->
        <div>
            <div class="flex items-center justify-between border-b border-[#F4F2EB] pb-2 mb-6">
                <div>
                    <h3 class="font-serif text-lg font-bold text-[#1C1917]">Project Content &amp; Descriptions</h3>
                    <p class="text-xs text-[#78716C] font-mono mt-0.5">Enter English details on the left, Indonesian on the right.</p>
                </div>
                <div class="flex items-center gap-2 text-xs font-mono">
                    <span class="px-2 py-0.5 rounded bg-blue-50 text-blue-800 border border-blue-200">🇬🇧 English</span>
                    <span class="px-2 py-0.5 rounded bg-emerald-50 text-emerald-800 border border-emerald-200">🇮🇩 Indonesia</span>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Column 1: English -->
                <div class="space-y-5 p-5 rounded-xl bg-[#FAF9F6] border border-[#E8E5DC]">
                    <div class="flex items-center gap-2 border-b border-[#E8E5DC] pb-2">
                        <span class="text-base">🇬🇧</span>
                        <h4 class="text-xs font-mono uppercase tracking-wider font-bold text-[#1C1917]">English Presentation</h4>
                    </div>

                    <div>
                        <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Project Title *</label>
                        <input type="text" name="title" value="{{ old('title', $project->title) }}" required class="w-full px-3.5 py-2.5 rounded-lg bg-white border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
                    </div>

                    <div>
                        <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Category *</label>
                        <input type="text" name="category" value="{{ old('category', $project->category) }}" required class="w-full px-3.5 py-2.5 rounded-lg bg-white border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
                    </div>

                    <div>
                        <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Tagline / Subtitle</label>
                        <input type="text" name="tagline" value="{{ old('tagline', $project->tagline) }}" class="w-full px-3.5 py-2.5 rounded-lg bg-white border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
                    </div>

                    <div>
                        <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Detailed Description *</label>
                        <textarea name="description" rows="5" required class="w-full px-3.5 py-2.5 rounded-lg bg-white border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none leading-relaxed">{{ old('description', $project->description) }}</textarea>
                    </div>
                </div>

                <!-- Column 2: Indonesian -->
                <div class="space-y-5 p-5 rounded-xl bg-[#FAF9F6] border border-[#E8E5DC]">
                    <div class="flex items-center gap-2 border-b border-[#E8E5DC] pb-2">
                        <span class="text-base">🇮🇩</span>
                        <h4 class="text-xs font-mono uppercase tracking-wider font-bold text-[#1C1917]">Presentasi Bahasa Indonesia</h4>
                    </div>

                    <div>
                        <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Judul Proyek (ID)</label>
                        <input type="text" name="title_id" value="{{ old('title_id', $project->title_id) }}" placeholder="Opsional jika judul sama" class="w-full px-3.5 py-2.5 rounded-lg bg-white border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
                    </div>

                    <div>
                        <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Kategori Proyek (ID)</label>
                        <input type="text" name="category_id" value="{{ old('category_id', $project->category_id) }}" placeholder="cth. Sistem Terdistribusi & Backend" class="w-full px-3.5 py-2.5 rounded-lg bg-white border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
                    </div>

                    <div>
                        <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Slogan / Subjudul (ID)</label>
                        <input type="text" name="tagline_id" value="{{ old('tagline_id', $project->tagline_id) }}" placeholder="Slogan teknis dalam Bahasa Indonesia" class="w-full px-3.5 py-2.5 rounded-lg bg-white border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
                    </div>

                    <div>
                        <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Deskripsi Lengkap (ID)</label>
                        <textarea name="description_id" rows="5" placeholder="Jelaskan tantangan teknis, arsitektur, dan dampak dalam Bahasa Indonesia..." class="w-full px-3.5 py-2.5 rounded-lg bg-white border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none leading-relaxed">{{ old('description_id', $project->description_id) }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Shared Technical Properties -->
        <div>
            <h3 class="font-serif text-lg font-bold text-[#1C1917] border-b border-[#F4F2EB] pb-2 mb-4">
                Shared Project Links &amp; Technical Attributes
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Slug (URL identifier)</label>
                    <input type="text" name="slug" value="{{ old('slug', $project->slug) }}" class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
                </div>

                <div>
                    <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Thumbnail Image URL</label>
                    <input type="text" name="thumbnail" value="{{ old('thumbnail', $project->thumbnail) }}" class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
                </div>

                <div>
                    <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Git Repository URL</label>
                    <input type="url" name="github_url" value="{{ old('github_url', $project->github_url) }}" class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
                </div>

                <div>
                    <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Live Demo / Website URL</label>
                    <input type="url" name="website_url" value="{{ old('website_url', $project->website_url) }}" class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
                </div>

            <div>
                <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Credential / Certificate URL (Optional)</label>
                <input type="url" name="certificate_url" value="{{ old('certificate_url', $project->certificate_url) }}" placeholder="https://credentials.example.com/project-award" class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
            </div>

            <div>
                <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Certificate Image URL (Optional)</label>
                <input type="text" name="certificate_image" value="{{ old('certificate_image', $project->certificate_image) }}" placeholder="https://..." class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
            </div>

            <div class="sm:col-span-2">
                <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Technologies Used</label>
                <input type="text" name="technologies" value="{{ old('technologies', is_array($project->technologies) ? implode(', ', $project->technologies) : '') }}" class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
                <p class="text-xs text-[#78716C] font-mono mt-1">Separate technologies with commas.</p>
            </div>

            <div class="flex items-center space-x-3 pt-2">
                <input type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured', $project->is_featured) ? 'checked' : '' }} class="rounded border-[#D6D3D1] text-[#1C1917] focus:ring-[#1C1917]">
                <label for="is_featured" class="text-xs font-mono text-[#1C1917] font-semibold cursor-pointer">
                    Highlight as Featured Project
                </label>
            </div>

            <div>
                <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Display Sort Order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $project->sort_order) }}" class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
            </div>
        </div>

        <div class="pt-4 border-t border-[#F4F2EB] flex justify-end gap-3">
            <a href="{{ route('admin.projects.index') }}" class="px-5 py-2.5 rounded-lg border border-[#D5D1C6] text-xs font-mono text-[#57534E] hover:bg-[#F4F2EB]">
                Cancel
            </a>
            <button type="submit" class="px-6 py-2.5 rounded-lg bg-[#1C1917] text-[#FAF9F6] font-medium text-xs font-mono hover:bg-[#322F2D] transition shadow-xs flex items-center gap-2">
                <span class="material-symbols-outlined text-sm">save</span>
                <span>Update Project</span>
            </button>
        </div>
    </form>

</div>
@endsection
