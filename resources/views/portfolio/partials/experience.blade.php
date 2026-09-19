<section id="experience" class="py-20 md:py-28 border-b border-[#E8E5DC] bg-[#FAF9F6]">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header with Classical Accent -->
        <div class="max-w-2xl mb-16">
            <div class="flex items-center gap-2 text-[#8F6A3B] text-xs font-mono tracking-widest uppercase font-semibold">
                <span>{{ __('portfolio.section_experience_number') }}</span>
                <span class="w-8 h-px bg-[#8F6A3B]"></span>
                <span>{{ __('portfolio.section_experience_label') }}</span>
            </div>
            <h2 class="font-serif text-3xl sm:text-4xl font-bold tracking-tight text-[#1C1917] mt-2">
                {{ __('portfolio.section_experience_title') }}
            </h2>
            <p class="text-[#57534E] text-base mt-2 leading-relaxed">
                {{ __('portfolio.section_experience_subtitle') }}
            </p>
        </div>

        <!-- Experience Timeline List -->
        <div class="relative pl-6 md:pl-10 space-y-12 before:absolute before:left-2 md:before:left-3.5 before:top-3 before:bottom-3 before:w-px before:bg-[#D5D1C6]">
            @forelse($experiences as $exp)
                <div class="relative group">
                    <!-- Timeline Node -->
                    <div class="absolute -left-[30px] md:-left-[46px] top-1.5 w-4 h-4 rounded-full border-2 border-[#FAF9F6] bg-[#1C1917] group-hover:scale-125 transition-transform duration-200">
                        @if($exp->is_current)
                            <span class="absolute inset-0 rounded-full bg-emerald-500 animate-ping opacity-60"></span>
                        @endif
                    </div>

                    <!-- Experience Card -->
                    <div class="bg-white rounded-xl border border-[#E8E5DC] p-6 sm:p-8 portfolio-card-hover shadow-xs">
                        <div class="flex flex-col sm:flex-row sm:items-baseline sm:justify-between gap-2 border-b border-[#F4F2EB] pb-4 mb-4">
                            <div>
                                <h3 class="font-serif text-xl sm:text-2xl font-bold text-[#1C1917]">
                                    {{ $exp->trans('role') }}
                                </h3>
                                <div class="flex items-center gap-2 text-[#8F6A3B] font-medium text-sm mt-0.5">
                                    @if($exp->company_url)
                                        <a href="{{ $exp->company_url }}" target="_blank" rel="noopener noreferrer" class="hover:underline flex items-center gap-1">
                                            <span>{{ $exp->company }}</span>
                                            <span class="material-symbols-outlined text-xs">arrow_outward</span>
                                        </a>
                                    @else
                                        <span>{{ $exp->company }}</span>
                                    @endif

                                    @if($exp->location)
                                        <span class="text-[#D5D1C6]">&bull;</span>
                                        <span class="text-[#78716C] font-normal">{{ $exp->location }}</span>
                                    @endif
                                </div>
                            </div>

                            <!-- Duration Badge -->
                            <div class="flex items-center gap-2">
                                <span class="px-3 py-1 rounded-md text-xs font-mono font-medium {{ $exp->is_current ? 'bg-[#1C1917] text-[#FAF9F6]' : 'bg-[#F4F2EB] text-[#57534E]' }}">
                                    {{ $exp->start_date }} — {{ $exp->is_current && strtolower($exp->end_date) === 'present' ? __('portfolio.present') : $exp->end_date }}
                                </span>
                            </div>
                        </div>

                        <!-- Role Summary Description -->
                        @if($exp->trans('description'))
                            <p class="text-[#57534E] text-sm leading-relaxed mb-4">
                                {{ $exp->trans('description') }}
                            </p>
                        @endif

                        <!-- Key Achievements / Highlights -->
                        @php
                            $highlights = $exp->trans('highlights');
                        @endphp
                        @if(!empty($highlights) && is_array($highlights))
                            <ul class="space-y-2 mb-6">
                                @foreach($highlights as $highlight)
                                    <li class="flex items-start gap-2.5 text-sm text-[#57534E] leading-relaxed">
                                        <span class="text-[#8F6A3B] mt-1 text-xs">&#9670;</span>
                                        <span>{{ $highlight }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @endif

                        <!-- Technologies Used -->
                        @if(!empty($exp->technologies) && is_array($exp->technologies))
                            <div class="pt-2 border-t border-[#F4F2EB] flex items-center flex-wrap gap-1.5">
                                <span class="text-xs font-mono text-[#78716C] mr-2">Technologies:</span>
                                @foreach($exp->technologies as $tech)
                                    <span class="inline-block text-xs font-mono px-2 py-0.5 bg-[#FAF9F6] border border-[#E8E5DC] text-[#44403C] rounded">
                                        {{ $tech }}
                                    </span>
                                @endforeach
                            </div>
                        @endif

                        <!-- Certificate / Credential Proof (Optional) -->
                        @if($exp->certificate_url || $exp->certificate_image)
                            <div class="mt-4 pt-3 border-t border-[#F4F2EB] flex flex-wrap items-center justify-between gap-2">
                                <a href="{{ $exp->certificate_url ?? $exp->certificate_image }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 px-3 py-1 rounded-md bg-[#FAF9F6] border border-[#D5D1C6] text-xs font-mono text-[#1C1917] hover:border-[#1C1917] hover:bg-[#F4F2EB] transition">
                                    <span class="material-symbols-outlined text-sm text-[#8F6A3B]">verified</span>
                                    <span>{{ __('portfolio.view_credential') }}</span>
                                    <span class="material-symbols-outlined text-xs">arrow_outward</span>
                                </a>
                                <span class="text-[11px] font-mono text-[#78716C]">{{ __('portfolio.verified_org_record') }}</span>
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <p class="text-[#78716C] italic">No experience records available.</p>
            @endforelse
        </div>

    </div>
</section>
