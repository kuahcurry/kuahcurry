@extends('layouts.admin')

@section('title', 'Edit Profile & Bio')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    
    <div class="border-b border-[#E8E5DC] pb-4">
        <h1 class="font-serif text-3xl font-bold text-[#1C1917]">Profile &amp; Biography</h1>
        <p class="text-sm text-[#57534E] mt-1">
            Update your identity, headshot picture, headline, biography, and public contact coordinates.
        </p>
    </div>

    <form action="{{ route('admin.profile.update') }}" method="POST" class="bg-white rounded-2xl border border-[#E8E5DC] p-6 sm:p-10 space-y-8 shadow-xs">
        @csrf
        @method('PUT')

        <!-- Dual-Column Localization: English vs Indonesian Content -->
        <div>
            <div class="flex items-center justify-between border-b border-[#F4F2EB] pb-2 mb-6">
                <div>
                    <h3 class="font-serif text-lg font-bold text-[#1C1917]">Bilingual Narrative Content</h3>
                    <p class="text-xs text-[#78716C] font-mono mt-0.5">English on the left, Indonesian on the right. Viewers toggle seamlessly on the site.</p>
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
                        <h4 class="text-xs font-mono uppercase tracking-wider font-bold text-[#1C1917]">English Content</h4>
                    </div>

                    <div>
                        <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Professional Title *</label>
                        <input type="text" name="title" value="{{ old('title', $profile->title) }}" required placeholder="e.g. Lead Software Architect" class="w-full px-3.5 py-2.5 rounded-lg bg-white border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
                    </div>

                    <div>
                        <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Classical Tagline Quote *</label>
                        <input type="text" name="tagline" value="{{ old('tagline', $profile->tagline) }}" required placeholder="e.g. Crafting enduring, high-performance web systems." class="w-full px-3.5 py-2.5 rounded-lg bg-white border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
                    </div>

                    <div>
                        <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Full Narrative Bio *</label>
                        <textarea name="bio" rows="6" required placeholder="Write your full narrative biography in English..." class="w-full px-3.5 py-2.5 rounded-lg bg-white border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none leading-relaxed">{{ old('bio', $profile->bio) }}</textarea>
                    </div>
                </div>

                <!-- Column 2: Indonesian -->
                <div class="space-y-5 p-5 rounded-xl bg-[#FAF9F6] border border-[#E8E5DC]">
                    <div class="flex items-center gap-2 border-b border-[#E8E5DC] pb-2">
                        <span class="text-base">🇮🇩</span>
                        <h4 class="text-xs font-mono uppercase tracking-wider font-bold text-[#1C1917]">Konten Bahasa Indonesia</h4>
                    </div>

                    <div>
                        <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Judul / Peran Profesional (ID)</label>
                        <input type="text" name="title_id" value="{{ old('title_id', $profile->title_id) }}" placeholder="cth. Arsitek Perangkat Lunak Utama" class="w-full px-3.5 py-2.5 rounded-lg bg-white border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
                    </div>

                    <div>
                        <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Kutipan / Slogan Klasik (ID)</label>
                        <input type="text" name="tagline_id" value="{{ old('tagline_id', $profile->tagline_id) }}" placeholder="cth. Merancang sistem web berkinerja tinggi yang tangguh dan abadi." class="w-full px-3.5 py-2.5 rounded-lg bg-white border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
                    </div>

                    <div>
                        <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Biografi Lengkap (ID)</label>
                        <textarea name="bio_id" rows="6" placeholder="Tulis biografi naratif Anda dalam Bahasa Indonesia..." class="w-full px-3.5 py-2.5 rounded-lg bg-white border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none leading-relaxed">{{ old('bio_id', $profile->bio_id) }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Primary Identity & Metadata -->
        <div>
            <h3 class="font-serif text-lg font-bold text-[#1C1917] border-b border-[#F4F2EB] pb-2 mb-4">
                Primary Identity &amp; Status
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Full Name *</label>
                    <input type="text" name="name" value="{{ old('name', $profile->name) }}" required class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
                </div>
                <div>
                    <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Years of Industry Experience *</label>
                    <input type="number" name="years_of_experience" value="{{ old('years_of_experience', $profile->years_of_experience) }}" min="0" max="60" required class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
                </div>
                <div class="sm:col-span-2">
                    <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Portrait Picture URL</label>
                    <input type="text" name="avatar" value="{{ old('avatar', $profile->avatar) }}" placeholder="https://..." class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
                </div>
                <div class="sm:col-span-2">
                    <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Availability Status *</label>
                    <input type="text" name="availability_status" value="{{ old('availability_status', $profile->availability_status) }}" required class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
                </div>
            </div>
        </div>

        <!-- Contact Channels & Socials -->
        <div>
            <h3 class="font-serif text-lg font-bold text-[#1C1917] border-b border-[#F4F2EB] pb-2 mb-4">
                Contact Person &amp; Network Links
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Email Address *</label>
                    <input type="email" name="email" value="{{ old('email', $profile->email) }}" required class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
                </div>
                <div>
                    <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Phone Number</label>
                    <input type="text" name="phone" value="{{ old('phone', $profile->phone) }}" class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
                </div>
                <div>
                    <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Location / Base</label>
                    <input type="text" name="location" value="{{ old('location', $profile->location) }}" class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
                </div>
                <div>
                    <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">GitHub URL</label>
                    <input type="url" name="github_url" value="{{ old('github_url', $profile->github_url) }}" class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
                </div>
                <div>
                    <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">LinkedIn URL</label>
                    <input type="url" name="linkedin_url" value="{{ old('linkedin_url', $profile->linkedin_url) }}" class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
                </div>
                <div>
                    <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Twitter / X URL</label>
                    <input type="url" name="twitter_url" value="{{ old('twitter_url', $profile->twitter_url) }}" class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
                </div>
                <div>
                    <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Personal Website URL</label>
                    <input type="url" name="website_url" value="{{ old('website_url', $profile->website_url) }}" class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
                </div>
                <div>
                    <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Resume / CV Link</label>
                    <input type="text" name="resume_url" value="{{ old('resume_url', $profile->resume_url) }}" class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
                </div>
            </div>
        </div>

        <div class="pt-4 border-t border-[#F4F2EB] flex justify-end">
            <button type="submit" class="px-6 py-3 rounded-lg bg-[#1C1917] text-[#FAF9F6] font-medium text-sm hover:bg-[#322F2D] transition shadow-xs flex items-center gap-2">
                <span class="material-symbols-outlined text-sm">save</span>
                <span>Save Profile Changes</span>
            </button>
        </div>
    </form>

</div>
@endsection
