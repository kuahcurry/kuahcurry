<section id="contact" class="py-20 md:py-28 border-b border-[#E8E5DC] bg-[#FAF9F6]">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="max-w-2xl mb-16">
            <div class="flex items-center gap-2 text-[#8F6A3B] text-xs font-mono tracking-widest uppercase font-semibold">
                <span>{{ __('portfolio.section_contact_number') }}</span>
                <span class="w-8 h-px bg-[#8F6A3B]"></span>
                <span>{{ __('portfolio.section_contact_label') }}</span>
            </div>
            <h2 class="font-serif text-3xl sm:text-4xl font-bold tracking-tight text-[#1C1917] mt-2">
                {{ __('portfolio.section_contact_title') }}
            </h2>
            <p class="text-[#57534E] text-base mt-2 leading-relaxed">
                {{ __('portfolio.section_contact_subtitle') }}
            </p>
        </div>

        <!-- Contact Person Card -->
        <div class="bg-white rounded-2xl border border-[#E8E5DC] p-8 sm:p-12 portfolio-card-hover shadow-sm">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
                
                <!-- Person Identity & Classical Seal (5 cols) -->
                <div class="lg:col-span-5 space-y-4 border-b lg:border-b-0 lg:border-r border-[#E8E5DC] pb-8 lg:pb-0 lg:pr-8">
                    <div class="flex items-center space-x-4">
                        <div class="w-16 h-16 rounded-xl bg-[#1C1917] text-[#FAF9F6] flex items-center justify-center font-serif text-2xl font-bold shadow-sm">
                            {{ substr($profile->name ?? 'AV', 0, 1) }}
                        </div>
                        <div>
                            <h3 class="font-serif text-2xl font-bold text-[#1C1917]">
                                {{ $profile->name ?? 'Alexander Vance' }}
                            </h3>
                            <p class="text-sm text-[#8F6A3B] font-medium">
                                {{ $profile->trans('title') ?? 'Senior Full-Stack Engineer & Architect' }}
                            </p>
                        </div>
                    </div>

                    <p class="text-sm text-[#57534E] leading-relaxed pt-2">
                        {{ $profile->trans('tagline') ?? 'Available for advisory, architecture consulting, and high-impact engineering projects.' }}
                    </p>

                    <!-- Response Expectation Badge -->
                    <div class="flex items-center gap-2 p-3 rounded-lg bg-[#FAF9F6] border border-[#E8E5DC] text-xs font-mono text-[#57534E]">
                        <span class="material-symbols-outlined text-[#8F6A3B] text-base">schedule</span>
                        <span>{{ __('portfolio.response_time') }}: {{ __('portfolio.response_time_val') }}</span>
                    </div>
                </div>

                <!-- Channels & Links (7 cols) -->
                <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-6">
                    
                    <!-- Direct Email -->
                    <div class="p-5 rounded-xl bg-[#FAF9F6] border border-[#E8E5DC] space-y-2">
                        <div class="flex items-center justify-between text-xs font-mono text-[#78716C]">
                            <span class="uppercase font-semibold">{{ __('portfolio.direct_email') }}</span>
                            <span class="material-symbols-outlined text-sm text-[#8F6A3B]">mail</span>
                        </div>
                        <p class="font-mono text-sm font-semibold text-[#1C1917] truncate">
                            {{ $profile->email ?? 'alexander.vance.dev@gmail.com' }}
                        </p>
                        <div class="pt-1 flex items-center gap-2">
                            <a href="mailto:{{ $profile->email ?? 'alexander.vance.dev@gmail.com' }}" class="text-xs text-[#8F6A3B] font-medium hover:underline">
                                Send Email &rarr;
                            </a>
                        </div>
                    </div>

                    <!-- Direct Phone / WhatsApp -->
                    <div class="p-5 rounded-xl bg-[#FAF9F6] border border-[#E8E5DC] space-y-2">
                        <div class="flex items-center justify-between text-xs font-mono text-[#78716C]">
                            <span class="uppercase font-semibold">{{ __('portfolio.direct_phone') }}</span>
                            <span class="material-symbols-outlined text-sm text-[#8F6A3B]">phone_iphone</span>
                        </div>
                        <p class="font-mono text-sm font-semibold text-[#1C1917]">
                            {{ $profile->phone ?? '+1 (415) 890-4321' }}
                        </p>
                        <div class="pt-1 flex items-center gap-2">
                            <a href="tel:{{ $profile->phone ?? '+14158904321' }}" class="text-xs text-[#8F6A3B] font-medium hover:underline">
                                Call / Message &rarr;
                            </a>
                        </div>
                    </div>

                    <!-- Location & Timezone -->
                    <div class="p-5 rounded-xl bg-[#FAF9F6] border border-[#E8E5DC] space-y-2">
                        <div class="flex items-center justify-between text-xs font-mono text-[#78716C]">
                            <span class="uppercase font-semibold">{{ __('portfolio.base_location') }}</span>
                            <span class="material-symbols-outlined text-sm text-[#8F6A3B]">location_city</span>
                        </div>
                        <p class="font-sans text-sm font-semibold text-[#1C1917]">
                            {{ $profile->location ?? 'San Francisco, CA / Remote' }}
                        </p>
                        <p class="text-xs text-[#78716C] font-mono">
                            UTC-8 (PST) / Flexible
                        </p>
                    </div>

                    <!-- Social / Code Repositories -->
                    <div class="p-5 rounded-xl bg-[#FAF9F6] border border-[#E8E5DC] space-y-2">
                        <div class="flex items-center justify-between text-xs font-mono text-[#78716C]">
                            <span class="uppercase font-semibold">Online Profiles</span>
                            <span class="material-symbols-outlined text-sm text-[#8F6A3B]">share</span>
                        </div>
                        <div class="flex items-center gap-3 pt-1">
                            @if($profile->github_url)
                                <a href="{{ $profile->github_url }}" target="_blank" rel="noopener noreferrer" class="text-xs font-mono px-2 py-1 bg-white border border-[#E8E5DC] rounded text-[#1C1917] hover:border-[#1C1917]">GitHub</a>
                            @endif
                            @if($profile->linkedin_url)
                                <a href="{{ $profile->linkedin_url }}" target="_blank" rel="noopener noreferrer" class="text-xs font-mono px-2 py-1 bg-white border border-[#E8E5DC] rounded text-[#1C1917] hover:border-[#1C1917]">LinkedIn</a>
                            @endif
                            @if($profile->twitter_url)
                                <a href="{{ $profile->twitter_url }}" target="_blank" rel="noopener noreferrer" class="text-xs font-mono px-2 py-1 bg-white border border-[#E8E5DC] rounded text-[#1C1917] hover:border-[#1C1917]">Twitter/X</a>
                            @endif
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
</section>
