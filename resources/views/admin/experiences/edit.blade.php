@extends('layouts.admin')

@section('title', 'Edit Experience — ' . $experience->role)

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    
    <div class="flex items-center justify-between border-b border-[#E8E5DC] pb-4">
        <div>
            <h1 class="font-serif text-3xl font-bold text-[#1C1917]">Edit Work Experience</h1>
            <p class="text-sm text-[#57534E] mt-1">Editing <span class="font-semibold text-[#1C1917]">{{ $experience->role }}</span> at {{ $experience->company }}</p>
        </div>
        <a href="{{ route('admin.experiences.index') }}" class="text-xs font-mono text-[#78716C] hover:text-[#1C1917]">
            &larr; Back to Experience
        </a>
    </div>

    <form action="{{ route('admin.experiences.update', $experience) }}" method="POST" class="bg-white rounded-2xl border border-[#E8E5DC] p-6 sm:p-10 space-y-8 shadow-xs">
        @csrf
        @method('PUT')

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
                        <input type="text" name="role" value="{{ old('role', $experience->role) }}" required class="w-full px-3.5 py-2.5 rounded-lg bg-white border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
                    </div>

                    <div>
                        <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Role Summary Description</label>
                        <textarea name="description" rows="3" class="w-full px-3.5 py-2.5 rounded-lg bg-white border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none leading-relaxed">{{ old('description', $experience->description) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Key Achievements &amp; Highlights</label>
                        <textarea name="highlights" rows="5" class="w-full px-3.5 py-2.5 rounded-lg bg-white border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none leading-relaxed">{{ old('highlights', is_array($experience->highlights) ? implode("\n", $experience->highlights) : '') }}</textarea>
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
                        <input type="text" name="role_id" value="{{ old('role_id', $experience->role_id) }}" placeholder="cth. Arsitek Perangkat Lunak Utama" class="w-full px-3.5 py-2.5 rounded-lg bg-white border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
                    </div>

                    <div>
                        <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Ringkasan Peran (ID)</label>
                        <textarea name="description_id" rows="3" placeholder="Gambaran umum divisi, cakupan tim, dan tanggung jawab..." class="w-full px-3.5 py-2.5 rounded-lg bg-white border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none leading-relaxed">{{ old('description_id', $experience->description_id) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Poin Pencapaian Utama (ID)</label>
                        <textarea name="highlights_id" rows="5" placeholder="Masukkan setiap pencapaian pada baris baru..." class="w-full px-3.5 py-2.5 rounded-lg bg-white border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none leading-relaxed">{{ old('highlights_id', is_array($experience->highlights_id) ? implode("\n", $experience->highlights_id) : '') }}</textarea>
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
                    <input type="text" name="company" value="{{ old('company', $experience->company) }}" required class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
                </div>

                <div>
                    <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Company URL</label>
                    <input type="url" name="company_url" value="{{ old('company_url', $experience->company_url) }}" class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
                </div>

                <div>
                    <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Location</label>
                    <input type="text" name="location" value="{{ old('location', $experience->location) }}" class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
                </div>

                <div>
                    <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Start Date *</label>
                    <input type="text" name="start_date" value="{{ old('start_date', $experience->start_date) }}" required class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
                </div>

                <div>
                    <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">End Date</label>
                    <input type="text" name="end_date" value="{{ old('end_date', $experience->end_date) }}" class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
                </div>

                <div class="flex items-center space-x-3 pt-6">
                    <input type="checkbox" id="is_current" name="is_current" value="1" {{ old('is_current', $experience->is_current) ? 'checked' : '' }} class="rounded border-[#D6D3D1] text-[#1C1917] focus:ring-[#1C1917]">
                    <label for="is_current" class="text-xs font-mono text-[#1C1917] font-semibold cursor-pointer">
                        This is my current role
                    </label>
                </div>

                <div>
                    <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Certificate / Credential URL (Optional)</label>
                    <input type="url" name="certificate_url" value="{{ old('certificate_url', $experience->certificate_url) }}" placeholder="https://credentials.example.com/certs/security-compliance" class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
                </div>

                <div>
                    <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Certificate Image URL (Optional)</label>
                    <input type="text" name="certificate_image" value="{{ old('certificate_image', $experience->certificate_image) }}" placeholder="https://..." class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
                </div>

            <div class="sm:col-span-2">
                <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Technologies Used</label>
                <input type="text" name="technologies" value="{{ old('technologies', is_array($experience->technologies) ? implode(', ', $experience->technologies) : '') }}" class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
                <p class="text-xs text-[#78716C] font-mono mt-1">Separate technologies with commas.</p>
            </div>

            <div>
                <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Display Sort Order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $experience->sort_order) }}" class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
            </div>
        </div>

        <div class="pt-4 border-t border-[#F4F2EB] flex justify-end gap-3">
            <a href="{{ route('admin.experiences.index') }}" class="px-5 py-2.5 rounded-lg border border-[#D5D1C6] text-xs font-mono text-[#57534E] hover:bg-[#F4F2EB]">
                Cancel
            </a>
            <button type="submit" class="px-6 py-2.5 rounded-lg bg-[#1C1917] text-[#FAF9F6] font-medium text-xs font-mono hover:bg-[#322F2D] transition shadow-xs flex items-center gap-2">
                <span class="material-symbols-outlined text-sm">save</span>
                <span>Update Experience</span>
            </button>
        </div>
    </form>

</div>
@endsection
