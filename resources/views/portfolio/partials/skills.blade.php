<section id="skills" class="py-20 md:py-28 border-b border-[#E8E5DC] bg-[#FAF9F6]">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="max-w-2xl mb-16">
            <div class="flex items-center gap-2 text-[#8F6A3B] text-xs font-mono tracking-widest uppercase font-semibold">
                <span>04</span>
                <span class="w-8 h-px bg-[#8F6A3B]"></span>
                <span>Capabilities</span>
            </div>
            <h2 class="font-serif text-3xl sm:text-4xl font-bold tracking-tight text-[#1C1917] mt-2">
                Languages & Frameworks
            </h2>
            <p class="text-[#57534E] text-base mt-2 leading-relaxed">
                Core technologies, framework proficiencies, and architectural capabilities honed over six years of production engineering.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            
            <!-- Category 1: Programming Languages -->
            <div class="bg-white rounded-xl border border-[#E8E5DC] p-6 sm:p-8 portfolio-card-hover shadow-xs">
                <div class="flex items-center gap-3 border-b border-[#F4F2EB] pb-4 mb-6">
                    <span class="w-9 h-9 rounded-lg bg-[#FAF9F6] border border-[#E8E5DC] flex items-center justify-center text-[#8F6A3B]">
                        <span class="material-symbols-outlined text-lg">code</span>
                    </span>
                    <div>
                        <h3 class="font-serif text-xl font-bold text-[#1C1917]">Programming Languages</h3>
                        <p class="text-xs text-[#78716C] font-mono">Syntax, memory management & type safety</p>
                    </div>
                </div>

                <div class="space-y-5">
                    @foreach($groupedSkills['languages'] as $skill)
                        <div>
                            <div class="flex items-center justify-between text-sm mb-1.5">
                                <span class="font-medium text-[#1C1917] flex items-center gap-2">
                                    <span class="material-symbols-outlined text-sm text-[#8F6A3B]">{{ $skill->icon ?? 'terminal' }}</span>
                                    <span>{{ $skill->name }}</span>
                                </span>
                                <span class="font-mono text-xs text-[#78716C]">{{ $skill->proficiency }}%</span>
                            </div>
                            <!-- Classical Minimalist Progress Bar -->
                            <div class="w-full h-1.5 bg-[#F4F2EB] rounded-full overflow-hidden">
                                <div class="h-full bg-[#1C1917] rounded-full transition-all duration-700" style="width: {{ $skill->proficiency }}%;"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Category 2: Frameworks & Libraries -->
            <div class="bg-white rounded-xl border border-[#E8E5DC] p-6 sm:p-8 portfolio-card-hover shadow-xs">
                <div class="flex items-center gap-3 border-b border-[#F4F2EB] pb-4 mb-6">
                    <span class="w-9 h-9 rounded-lg bg-[#FAF9F6] border border-[#E8E5DC] flex items-center justify-center text-[#8F6A3B]">
                        <span class="material-symbols-outlined text-lg">layers</span>
                    </span>
                    <div>
                        <h3 class="font-serif text-xl font-bold text-[#1C1917]">Frameworks & Component Systems</h3>
                        <p class="text-xs text-[#78716C] font-mono">Modern web orchestration & UI design systems</p>
                    </div>
                </div>

                <div class="space-y-5">
                    @foreach($groupedSkills['frameworks'] as $skill)
                        <div>
                            <div class="flex items-center justify-between text-sm mb-1.5">
                                <span class="font-medium text-[#1C1917] flex items-center gap-2">
                                    <span class="material-symbols-outlined text-sm text-[#8F6A3B]">{{ $skill->icon ?? 'layers' }}</span>
                                    <span>{{ $skill->name }}</span>
                                </span>
                                <span class="font-mono text-xs text-[#78716C]">{{ $skill->proficiency }}%</span>
                            </div>
                            <div class="w-full h-1.5 bg-[#F4F2EB] rounded-full overflow-hidden">
                                <div class="h-full bg-[#8F6A3B] rounded-full transition-all duration-700" style="width: {{ $skill->proficiency }}%;"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Category 3: Databases & Storage -->
            <div class="bg-white rounded-xl border border-[#E8E5DC] p-6 sm:p-8 portfolio-card-hover shadow-xs">
                <div class="flex items-center gap-3 border-b border-[#F4F2EB] pb-4 mb-6">
                    <span class="w-9 h-9 rounded-lg bg-[#FAF9F6] border border-[#E8E5DC] flex items-center justify-center text-[#8F6A3B]">
                        <span class="material-symbols-outlined text-lg">storage</span>
                    </span>
                    <div>
                        <h3 class="font-serif text-xl font-bold text-[#1C1917]">Databases & In-Memory Storage</h3>
                        <p class="text-xs text-[#78716C] font-mono">Query indexing, relational modeling & cache</p>
                    </div>
                </div>

                <div class="space-y-5">
                    @foreach($groupedSkills['databases'] as $skill)
                        <div>
                            <div class="flex items-center justify-between text-sm mb-1.5">
                                <span class="font-medium text-[#1C1917] flex items-center gap-2">
                                    <span class="material-symbols-outlined text-sm text-[#8F6A3B]">{{ $skill->icon ?? 'storage' }}</span>
                                    <span>{{ $skill->name }}</span>
                                </span>
                                <span class="font-mono text-xs text-[#78716C]">{{ $skill->proficiency }}%</span>
                            </div>
                            <div class="w-full h-1.5 bg-[#F4F2EB] rounded-full overflow-hidden">
                                <div class="h-full bg-[#1C1917] rounded-full transition-all duration-700" style="width: {{ $skill->proficiency }}%;"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Category 4: Tools, DevOps & Architecture -->
            <div class="bg-white rounded-xl border border-[#E8E5DC] p-6 sm:p-8 portfolio-card-hover shadow-xs">
                <div class="flex items-center gap-3 border-b border-[#F4F2EB] pb-4 mb-6">
                    <span class="w-9 h-9 rounded-lg bg-[#FAF9F6] border border-[#E8E5DC] flex items-center justify-center text-[#8F6A3B]">
                        <span class="material-symbols-outlined text-lg">architecture</span>
                    </span>
                    <div>
                        <h3 class="font-serif text-xl font-bold text-[#1C1917]">DevOps, Testing & Infrastructure</h3>
                        <p class="text-xs text-[#78716C] font-mono">CI/CD automation, cloud deployment & reliability</p>
                    </div>
                </div>

                <div class="space-y-5">
                    @foreach($groupedSkills['tools'] as $skill)
                        <div>
                            <div class="flex items-center justify-between text-sm mb-1.5">
                                <span class="font-medium text-[#1C1917] flex items-center gap-2">
                                    <span class="material-symbols-outlined text-sm text-[#8F6A3B]">{{ $skill->icon ?? 'architecture' }}</span>
                                    <span>{{ $skill->name }}</span>
                                </span>
                                <span class="font-mono text-xs text-[#78716C]">{{ $skill->proficiency }}%</span>
                            </div>
                            <div class="w-full h-1.5 bg-[#F4F2EB] rounded-full overflow-hidden">
                                <div class="h-full bg-[#8F6A3B] rounded-full transition-all duration-700" style="width: {{ $skill->proficiency }}%;"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

    </div>
</section>
