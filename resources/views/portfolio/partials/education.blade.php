<section id="education" class="py-20 md:py-28 border-b border-[#E8E5DC] bg-[#FAF9F6]">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="max-w-2xl mb-16">
            <div class="flex items-center gap-2 text-[#8F6A3B] text-xs font-mono tracking-widest uppercase font-semibold">
                <span>{{ __('portfolio.section_education_number') }}</span>
                <span class="w-8 h-px bg-[#8F6A3B]"></span>
                <span>{{ __('portfolio.section_education_label') }}</span>
            </div>
            <h2 class="font-serif text-3xl sm:text-4xl font-bold tracking-tight text-[#1C1917] mt-2">
                {{ __('portfolio.section_education_title') }}
            </h2>
            <p class="text-[#57534E] text-base mt-2 leading-relaxed">
                {{ __('portfolio.section_education_subtitle') }}
            </p>
        </div>

        <!-- Education Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @forelse($education as $item)
                <div class="bg-white rounded-xl border border-[#E8E5DC] p-6 sm:p-8 portfolio-card-hover shadow-xs flex flex-col justify-between">
                    <div>
                        <!-- Institution and Date Header -->
                        <div class="flex items-start justify-between gap-4 border-b border-[#F4F2EB] pb-4 mb-4">
                            <div class="space-y-1">
                                <span class="text-xs font-mono uppercase tracking-wider text-[#8F6A3B] font-semibold">
                                    {{ $item->institution }}
                                </span>
                                <h3 class="font-serif text-xl sm:text-2xl font-bold text-[#1C1917] leading-tight">
                                    {{ $item->trans('degree') }}
                                </h3>
                                <p class="text-sm text-[#78716C] font-medium">
                                    {{ $item->trans('field_of_study') }}
                                </p>
                            </div>

                            <!-- Year Pill -->
                            <span class="shrink-0 px-3 py-1 bg-[#F4F2EB] text-[#57534E] text-xs font-mono rounded-md">
                                {{ $item->start_year }} — {{ $item->end_year }}
                            </span>
                        </div>

                        <!-- Grade / Distinction Badge -->
                        @if($item->grade)
                            <div class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-[#FAF9F6] border border-[#E8E5DC] rounded text-xs font-mono text-[#1C1917] font-semibold mb-4">
                                <span class="material-symbols-outlined text-sm text-[#8F6A3B]">workspace_premium</span>
                                <span>{{ $item->grade }}</span>
                            </div>
                        @endif

                        <!-- Description -->
                        @if($item->trans('description'))
                            <p class="text-sm text-[#57534E] leading-relaxed mb-4">
                                {{ $item->trans('description') }}
                            </p>
                        @endif

                        <!-- Achievements / Capstone -->
                        @php
                            $achievements = $item->trans('achievements');
                        @endphp
                        @if(!empty($achievements) && is_array($achievements))
                            <div class="space-y-1.5 mt-2">
                                <span class="text-xs font-mono uppercase tracking-wider text-[#78716C]">
                                    {{ app()->getLocale() === 'id' ? 'Prestasi & Kehormatan:' : 'Honors & Activities:' }}
                                </span>
                                <ul class="space-y-1 text-xs text-[#57534E]">
                                    @foreach($achievements as $ach)
                                        <li class="flex items-start gap-2">
                                            <span class="text-[#8F6A3B] mt-0.5">&bull;</span>
                                            <span>{{ $ach }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                    <div class="mt-6 pt-4 border-t border-[#F4F2EB] flex items-center justify-between text-xs text-[#78716C] font-mono">
                        <span class="flex items-center gap-1">
                            <span class="material-symbols-outlined text-sm text-[#8F6A3B]">verified</span>
                            <span>{{ __('portfolio.verified_org_record') }}</span>
                        </span>
                        <span>Academic Record</span>
                    </div>
                </div>
            @empty
                <p class="text-[#78716C] italic">No education records found.</p>
            @endforelse
        </div>

    </div>
</section>
