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

        <!-- Primary Identity -->
        <div>
            <h3 class="font-serif text-lg font-bold text-[#1C1917] border-b border-[#F4F2EB] pb-2 mb-4">
                Primary Identity
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Full Name *</label>
                    <input type="text" name="name" value="{{ old('name', $profile->name) }}" required class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
                </div>
                <div>
                    <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Professional Title *</label>
                    <input type="text" name="title" value="{{ old('title', $profile->title) }}" required class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
                </div>
                <div class="sm:col-span-2">
                    <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Classical Tagline Quote *</label>
                    <input type="text" name="tagline" value="{{ old('tagline', $profile->tagline) }}" required class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
                </div>
            </div>
        </div>

        <!-- Picture & Status -->
        <div>
            <h3 class="font-serif text-lg font-bold text-[#1C1917] border-b border-[#F4F2EB] pb-2 mb-4">
                Picture &amp; Engagement Availability
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="sm:col-span-2">
                    <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Portrait Picture URL</label>
                    <input type="text" name="avatar" value="{{ old('avatar', $profile->avatar) }}" placeholder="https://..." class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
                    <p class="text-xs text-[#78716C] mt-1 font-mono">Accepts an image URL or local storage asset path.</p>
                </div>
                <div>
                    <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Availability Status *</label>
                    <input type="text" name="availability_status" value="{{ old('availability_status', $profile->availability_status) }}" required class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
                </div>
                <div>
                    <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Years of Industry Experience *</label>
                    <input type="number" name="years_of_experience" value="{{ old('years_of_experience', $profile->years_of_experience) }}" min="0" max="60" required class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
                </div>
            </div>
        </div>

        <!-- Biography -->
        <div>
            <h3 class="font-serif text-lg font-bold text-[#1C1917] border-b border-[#F4F2EB] pb-2 mb-4">
                Biography Content
            </h3>
            <div class="space-y-4">
                <div>
                    <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Full Narrative Bio *</label>
                    <textarea name="bio" rows="6" required class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none leading-relaxed">{{ old('bio', $profile->bio) }}</textarea>
                    <p class="text-xs text-[#78716C] mt-1 font-mono">Use double line breaks to separate paragraphs.</p>
                </div>
                <div>
                    <label class="block text-xs font-mono uppercase tracking-wider text-[#78716C] mb-1.5 font-semibold">Short Bio / Highlights</label>
                    <input type="text" name="short_bio" value="{{ old('short_bio', $profile->short_bio) }}" class="w-full px-3.5 py-2.5 rounded-lg bg-[#FAF9F6] border border-[#D6D3D1] text-sm text-[#1C1917] focus:ring-1 focus:ring-[#1C1917] outline-none">
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
