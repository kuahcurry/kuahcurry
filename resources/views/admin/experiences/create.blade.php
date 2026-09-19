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

    <form action="{{ route('admin.experiences.store') }}" method="POST" class="bg-white rounded-2xl border border-[#E8E5DC] p-6 sm:p-10 space-y-8 shadow-xs">
        @csrf

        <!-- Bilingual Content: 2 Columns -->
        <div>
            <div class="flex items-center justify-between border-b border-[#F4F2EB] pb-2 mb-6">
                <div>
                    <h3 class="font-serif text-lg font-bold text-[#1C1917]">Role &amp; Responsibilities</h3>
                    <p class="text-xs text-[#78716C] font-mono mt-0.5">English on the left, Indonesian on the right.</p>
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
                        <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Role / Job Title *</label>
                        <input type="text" name="role" value="{{ old('role') }}" required placeholder="e.g. Lead Software Architect" class="w-full px-3.5 py-2.5 rounded-lg bg-white border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
                    </div>

                    <div>
                        <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Role Summary Description</label>
                        <textarea name="description" rows="3" placeholder="Overview of department, team scope, and high-level responsibilities..." class="w-full px-3.5 py-2.5 rounded-lg bg-white border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none leading-relaxed">{{ old('description') }}</textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Key Achievements &amp; Highlights</label>
                        <textarea name="highlights" rows="5" placeholder="Enter each bullet accomplishment on a new line..." class="w-full px-3.5 py-2.5 rounded-lg bg-white border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none leading-relaxed">{{ old('highlights') }}</textarea>
                        <p class="text-xs text-[#78716C] font-mono mt-1">One accomplishment per line.</p>
                    </div>
                </div>

                <!-- Column 2: Indonesian -->
                <div class="space-y-5 p-5 rounded-xl bg-[#FAF9F6] border border-[#E8E5DC]">
                    <div class="flex items-center gap-2 border-b border-[#E8E5DC] pb-2">
                        <span class="text-base">🇮🇩</span>
                        <h4 class="text-xs font-mono uppercase tracking-wider font-bold text-[#1C1917]">Presentasi Bahasa Indonesia</h4>
                    </div>

                    <div>
                        <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Jabatan / Posisi (ID)</label>
                        <input type="text" name="role_id" value="{{ old('role_id') }}" placeholder="cth. Arsitek Perangkat Lunak Utama" class="w-full px-3.5 py-2.5 rounded-lg bg-white border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
                    </div>

                    <div>
                        <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Ringkasan Peran (ID)</label>
                        <textarea name="description_id" rows="3" placeholder="Gambaran umum divisi, cakupan tim, dan tanggung jawab..." class="w-full px-3.5 py-2.5 rounded-lg bg-white border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none leading-relaxed">{{ old('description_id') }}</textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Poin Pencapaian Utama (ID)</label>
                        <textarea name="highlights_id" rows="5" placeholder="Masukkan setiap pencapaian pada baris baru..." class="w-full px-3.5 py-2.5 rounded-lg bg-white border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none leading-relaxed">{{ old('highlights_id') }}</textarea>
                        <p class="text-xs text-[#78716C] font-mono mt-1">Satu pencapaian per baris.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Shared Position & Organization Metadata -->
        <div>
            <h3 class="font-serif text-lg font-bold text-[#1C1917] border-b border-[#F4F2EB] pb-2 mb-4">
                Organization &amp; Timeline Details
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
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

                <div class="flex items-center space-x-3 pt-6">
                    <input type="checkbox" id="is_current" name="is_current" value="1" {{ old('is_current') ? 'checked' : '' }} class="rounded border-[#D6D3D1] text-[#1C1917] focus:ring-[#1C1917]">
                    <label for="is_current" class="text-xs font-mono text-[#1C1917] font-semibold cursor-pointer">
                        This is my current role
                    </label>
                </div>

                <div>
                    <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Certificate / Credential URL (Optional)</label>
                    <input type="url" name="certificate_url" value="{{ old('certificate_url') }}" placeholder="https://credentials.example.com/certs/security-compliance" class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
                </div>

                <div>
                    <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Certificate Image URL (Optional)</label>
                    <input type="text" name="certificate_image" value="{{ old('certificate_image') }}" placeholder="https://..." class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
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
