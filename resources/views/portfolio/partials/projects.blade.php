<section id="projects" class="py-20 md:py-28 border-b border-[#E8E5DC] bg-[#FAF9F6]">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12">
            <div class="max-w-2xl">
                <div class="flex items-center gap-2 text-[#8F6A3B] text-xs font-mono tracking-widest uppercase font-semibold">
                    <span>{{ __('portfolio.section_projects_number') }}</span>
                    <span class="w-8 h-px bg-[#8F6A3B]"></span>
                    <span>{{ __('portfolio.section_projects_label') }}</span>
                </div>
                <h2 class="font-serif text-3xl sm:text-4xl font-bold tracking-tight text-[#1C1917] mt-2">
                    {{ __('portfolio.section_projects_title') }}
                </h2>
                <p class="text-[#57534E] text-base mt-2 leading-relaxed">
                    {{ __('portfolio.section_projects_subtitle') }}
                </p>
            </div>

            <!-- Material Web Filter Chip Set -->
            <div class="mt-6 md:mt-0">
                <md-chip-set class="flex flex-wrap gap-2">
                    <md-filter-chip label="{{ __('portfolio.all_works') }}" selected class="project-filter-chip" data-category="all"></md-filter-chip>
                    @foreach($categories as $cat)
                        <md-filter-chip label="{{ $cat }}" class="project-filter-chip" data-category="{{ $cat }}"></md-filter-chip>
                    @endforeach
                </md-chip-set>
            </div>
        </div>

        <!-- Projects Grid -->
        <div id="projects-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($projects as $proj)
                <article 
                    class="project-card flex flex-col bg-white rounded-xl border border-[#E8E5DC] overflow-hidden portfolio-card-hover shadow-xs transition-all duration-300" 
                    data-category="{{ $proj->category }}"
                >
                    <!-- Project Image Thumbnail -->
                    <div class="relative aspect-[16/10] bg-[#F4F2EB] overflow-hidden border-b border-[#E8E5DC] group">
                        <img 
                            src="{{ $proj->thumbnail ?? 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=800&q=80' }}" 
                            alt="{{ $proj->trans('title') }}" 
                            class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500 ease-out"
                            loading="lazy"
                        >
                        <!-- Category Badge Overlaid -->
                        <div class="absolute top-3 left-3 bg-[#1C1917]/90 text-[#FAF9F6] text-[11px] font-mono px-2.5 py-1 rounded backdrop-blur-xs">
                            {{ $proj->trans('category') }}
                        </div>
                        @if($proj->is_featured)
                            <div class="absolute top-3 right-3 bg-[#8F6A3B] text-white text-[11px] font-mono px-2 py-0.5 rounded flex items-center gap-1 shadow-sm">
                                <span class="material-symbols-outlined text-xs">star</span>
                                <span>Featured</span>
                            </div>
                        @endif
                    </div>

                    <!-- Project Content -->
                    <div class="p-6 flex-1 flex flex-col justify-between space-y-4">
                        <div>
                            <h3 class="font-serif text-xl font-bold text-[#1C1917] leading-snug hover:text-[#8F6A3B] transition-colors">
                                {{ $proj->trans('title') }}
                            </h3>
                            @if($proj->trans('tagline'))
                                <p class="text-xs font-mono text-[#8F6A3B] font-medium mt-1">
                                    {{ $proj->trans('tagline') }}
                                </p>
                            @endif
                            <p class="text-sm text-[#57534E] leading-relaxed mt-3">
                                {{ $proj->trans('description') }}
                            </p>
                        </div>

                        <!-- Tech Stack Tags -->
                        @if(!empty($proj->technologies) && is_array($proj->technologies))
                            <div class="pt-2 flex flex-wrap gap-1.5 border-t border-[#F4F2EB]">
                                @foreach($proj->technologies as $tech)
                                    <span class="text-[11px] font-mono px-2 py-0.5 bg-[#F4F2EB] text-[#44403C] rounded">
                                        {{ $tech }}
                                    </span>
                                @endforeach
                            </div>
                        @endif

                        <!-- Action Links: Git Repo & Live Website -->
                        <div class="pt-4 border-t border-[#F4F2EB] flex items-center justify-between gap-3">
                            <!-- Git Repo Link -->
                            @if($proj->github_url)
                                <a href="{{ $proj->github_url }}" target="_blank" rel="noopener noreferrer" class="flex-1 text-decoration-none">
                                    <md-outlined-button style="width: 100%; --md-outlined-button-outline-color: #D5D1C6; --md-outlined-button-label-text-color: #1C1917; font-size: 0.75rem; height: 36px;">
                                        <svg slot="icon" class="w-4 h-4 fill-current mr-1" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                                        {{ __('portfolio.source_repo') }}
                                    </md-outlined-button>
                                </a>
                            @else
                                <span class="flex-1 text-center text-xs text-[#78716C] font-mono italic">{{ __('portfolio.private_repo') }}</span>
                            @endif

                            <!-- Website Live Link -->
                            @if($proj->website_url)
                                <a href="{{ $proj->website_url }}" target="_blank" rel="noopener noreferrer" class="flex-1 text-decoration-none">
                                    <md-filled-button style="width: 100%; --md-filled-button-container-color: #1C1917; --md-filled-button-label-text-color: #FAF9F6; font-size: 0.75rem; height: 36px;">
                                        <span slot="icon" class="material-symbols-outlined text-sm">open_in_new</span>
                                        {{ __('portfolio.live_demo') }}
                                    </md-filled-button>
                                </a>
                            @endif
                        </div>

                        <!-- Optional Certificate / Credential Link -->
                        @if($proj->certificate_url || $proj->certificate_image)
                            <div class="pt-2 flex items-center justify-between border-t border-[#F4F2EB]">
                                <a href="{{ $proj->certificate_url ?? $proj->certificate_image }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 text-xs font-mono text-[#8F6A3B] hover:text-[#1C1917] transition">
                                    <span class="material-symbols-outlined text-sm">workspace_premium</span>
                                    <span>{{ __('portfolio.project_credential') }}</span>
                                    <span class="material-symbols-outlined text-[10px]">arrow_outward</span>
                                </a>
                            </div>
                        @endif
                    </div>
                </article>
            @empty
                <div class="col-span-3 text-center py-12 text-[#78716C] italic">
                    No projects available at this moment.
                </div>
            @endforelse
        </div>

    </div>
</section>
