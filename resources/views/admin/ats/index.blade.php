@extends('layouts.admin')

@section('title', 'ATS Resume Generator')

@section('content')
<style>
    @media print {
        header, footer, .no-print {
            display: none !important;
        }
        body, main {
            background: white !important;
            padding: 0 !important;
            margin: 0 !important;
        }
        .ats-document {
            border: none !important;
            box-shadow: none !important;
            padding: 0 !important;
            max-width: 100% !important;
            margin: 0 !important;
        }
    }
</style>

<div class="space-y-6">
    
    <!-- Control Header & Toolbar -->
    <div class="no-print bg-white rounded-2xl border border-[#E8E5DC] p-6 shadow-xs space-y-5">
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
            <div>
                <div class="flex items-center gap-2 text-emerald-800 text-xs font-mono tracking-widest uppercase font-semibold">
                    <span class="w-2 h-2 rounded-full bg-emerald-600 animate-pulse"></span>
                    <span>Executive ATS Parser &amp; Resume Engine</span>
                </div>
                <h1 class="font-serif text-2xl sm:text-3xl font-bold text-[#1C1917] mt-1">
                    ATS-Friendly Resume Generator
                </h1>
                <p class="text-xs sm:text-sm text-[#57534E] mt-0.5">
                    Generates clean, single-column plain-text and printable resumes formatted for Greenhouse, Lever, Workday, and Taleo algorithms.
                </p>
            </div>

            <!-- Language Selector & Main Actions -->
            <div class="flex flex-wrap items-center gap-3">
                <!-- Language Switcher for ATS Output -->
                <div class="flex items-center bg-[#FAF9F6] border border-[#D5D1C6] rounded-xl p-1 text-xs font-mono">
                    <a href="{{ route('admin.ats.index', ['lang' => 'en']) }}" 
                       class="px-3 py-1.5 rounded-lg transition flex items-center gap-1.5 {{ $targetLocale === 'en' ? 'bg-[#1C1917] text-white font-semibold shadow-xs' : 'text-[#78716C] hover:text-[#1C1917]' }}">
                        <span>🇬🇧</span>
                        <span>English ATS</span>
                    </a>
                    <a href="{{ route('admin.ats.index', ['lang' => 'id']) }}" 
                       class="px-3 py-1.5 rounded-lg transition flex items-center gap-1.5 {{ $targetLocale === 'id' ? 'bg-[#1C1917] text-white font-semibold shadow-xs' : 'text-[#78716C] hover:text-[#1C1917]' }}">
                        <span>🇮🇩</span>
                        <span>Indonesian ATS</span>
                    </a>
                </div>

                <button 
                    type="button" 
                    id="copy-ats-btn" 
                    onclick="copyAtsContent()" 
                    class="px-4 py-2.5 rounded-xl bg-[#1C1917] text-[#FAF9F6] text-xs font-mono font-medium hover:bg-[#322F2D] transition shadow-xs flex items-center gap-2"
                >
                    <span class="material-symbols-outlined text-sm">content_copy</span>
                    <span id="copy-btn-text">Copy Full Text</span>
                </button>

                <button 
                    type="button" 
                    onclick="downloadAtsTxt()" 
                    class="px-3.5 py-2.5 rounded-xl bg-white border border-[#D5D1C6] text-[#1C1917] text-xs font-mono font-medium hover:bg-[#FAF9F6] transition flex items-center gap-1.5 shadow-2xs"
                >
                    <span class="material-symbols-outlined text-sm">download</span>
                    <span>.txt</span>
                </button>

                <button 
                    type="button" 
                    onclick="window.print()" 
                    class="px-3.5 py-2.5 rounded-xl bg-white border border-[#D5D1C6] text-[#1C1917] text-xs font-mono font-medium hover:bg-[#FAF9F6] transition flex items-center gap-1.5 shadow-2xs"
                >
                    <span class="material-symbols-outlined text-sm">print</span>
                    <span>Print PDF</span>
                </button>
            </div>
        </div>

        <!-- Quick Copy Section Buttons -->
        <div class="pt-4 border-t border-[#F4F2EB] flex flex-col sm:flex-row sm:items-center justify-between gap-3">
            <div class="flex items-center gap-2">
                <span class="text-xs font-mono uppercase tracking-wider text-[#78716C] font-semibold">Copy Specific Section:</span>
                <span id="toast-indicator" class="hidden text-[11px] font-mono font-semibold px-2.5 py-0.5 rounded-full bg-emerald-100 text-emerald-800 transition">
                    Copied!
                </span>
            </div>

            <div class="flex flex-wrap items-center gap-2">
                <button type="button" onclick="copyAtsSection('bio', 'Bio')" class="px-3 py-1.5 rounded-lg bg-[#FAF9F6] border border-[#E8E5DC] text-xs font-mono text-[#1C1917] hover:bg-[#1C1917] hover:text-white transition shadow-2xs flex items-center gap-1">
                    <span class="material-symbols-outlined text-[14px]">badge</span>
                    <span>Bio</span>
                </button>

                <button type="button" onclick="copyAtsSection('education', 'Education')" class="px-3 py-1.5 rounded-lg bg-[#FAF9F6] border border-[#E8E5DC] text-xs font-mono text-[#1C1917] hover:bg-[#1C1917] hover:text-white transition shadow-2xs flex items-center gap-1">
                    <span class="material-symbols-outlined text-[14px]">school</span>
                    <span>Education</span>
                </button>

                <button type="button" onclick="copyAtsSection('experience', 'Experience')" class="px-3 py-1.5 rounded-lg bg-[#FAF9F6] border border-[#E8E5DC] text-xs font-mono text-[#1C1917] hover:bg-[#1C1917] hover:text-white transition shadow-2xs flex items-center gap-1">
                    <span class="material-symbols-outlined text-[14px]">work</span>
                    <span>Experience</span>
                </button>

                <button type="button" onclick="copyAtsSection('projects', 'Projects')" class="px-3 py-1.5 rounded-lg bg-[#FAF9F6] border border-[#E8E5DC] text-xs font-mono text-[#1C1917] hover:bg-[#1C1917] hover:text-white transition shadow-2xs flex items-center gap-1">
                    <span class="material-symbols-outlined text-[14px]">terminal</span>
                    <span>Projects</span>
                </button>

                <button type="button" onclick="copyAtsSection('skills', 'Skills')" class="px-3 py-1.5 rounded-lg bg-[#FAF9F6] border border-[#E8E5DC] text-xs font-mono text-[#1C1917] hover:bg-[#1C1917] hover:text-white transition shadow-2xs flex items-center gap-1">
                    <span class="material-symbols-outlined text-[14px]">psychology</span>
                    <span>Skills</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Hidden Raw Text Areas for Section Generators -->
    <textarea id="ats-raw-text" class="hidden">{{ $plainText }}</textarea>
    <textarea id="ats-raw-bio" class="hidden">{{ $bioText }}</textarea>
    <textarea id="ats-raw-education" class="hidden">{{ $educationText }}</textarea>
    <textarea id="ats-raw-experience" class="hidden">{{ $experiencesText }}</textarea>
    <textarea id="ats-raw-projects" class="hidden">{{ $projectsText }}</textarea>
    <textarea id="ats-raw-skills" class="hidden">{{ $skillsText }}</textarea>

    <!-- Executive Paper Resume Layout (ATS Formatted) -->
    <div class="ats-document max-w-4xl mx-auto bg-white rounded-2xl border border-[#E8E5DC] p-8 sm:p-14 shadow-sm text-[#1C1917] font-sans leading-normal">
        
        <!-- Header: Candidate Information -->
        <div class="border-b-2 border-[#1C1917] pb-4 text-center space-y-1">
            <h1 class="text-3xl font-bold tracking-tight uppercase font-serif text-[#1C1917]">
                {{ $profile->name ?? 'Candidate Name' }}
            </h1>
            <p class="text-sm font-semibold text-stone-700 font-mono">
                {{ $profile->trans('title') ?? 'Lead Software Architect' }}
                @if($profile->trans('tagline')) &bull; {{ $profile->trans('tagline') }} @endif
            </p>
            <div class="flex flex-wrap justify-center items-center gap-x-2.5 gap-y-1 text-xs text-stone-600 font-mono pt-1">
                @if($profile->email) <span>{{ $profile->email }}</span> @endif
                @if($profile->phone) <span>&bull; {{ $profile->phone }}</span> @endif
                @if($profile->location) <span>&bull; {{ $profile->location }}</span> @endif
                @if($profile->linkedin_url) <span>&bull; <a href="{{ $profile->linkedin_url }}" class="underline hover:text-black">LinkedIn</a></span> @endif
                @if($profile->github_url) <span>&bull; <a href="{{ $profile->github_url }}" class="underline hover:text-black">GitHub</a></span> @endif
                @if($profile->website_url) <span>&bull; <a href="{{ $profile->website_url }}" class="underline hover:text-black">Portfolio</a></span> @endif
            </div>
        </div>

        <!-- 1. Professional Summary -->
        <section class="mt-6 space-y-1.5">
            <h2 class="text-xs font-mono font-bold tracking-widest uppercase text-[#1C1917] border-b border-stone-300 pb-1 flex items-center justify-between">
                <span>{{ $targetLocale === 'id' ? 'Ringkasan Profesional' : 'Professional Summary' }}</span>
                <span class="text-[10px] text-stone-400 font-normal">ATS SECTION 01</span>
            </h2>
            <p class="text-xs sm:text-sm leading-relaxed text-stone-800 text-justify">
                {{ $profile->trans('bio') ?? 'Experienced full stack software architect and engineering leader with deep expertise in scalable cloud architectures, resilient distributed systems, and modern component methodologies.' }}
            </p>
        </section>

        <!-- 2. Core Competencies & Technical Skills -->
        <section class="mt-6 space-y-2">
            <h2 class="text-xs font-mono font-bold tracking-widest uppercase text-[#1C1917] border-b border-stone-300 pb-1 flex items-center justify-between">
                <span>{{ $targetLocale === 'id' ? 'Kompetensi Utama & Keahlian Teknologi' : 'Core Competencies & Technical Stack' }}</span>
                <span class="text-[10px] text-stone-400 font-normal">ATS SECTION 02</span>
            </h2>
            <div class="text-xs sm:text-sm space-y-1.5 text-stone-800">
                @php
                    $langs = $technicalSkills->where('category', 'programming_language')->map(fn($s) => $s->trans('name'))->implode(', ');
                    $frameworks = $technicalSkills->where('category', 'framework')->map(fn($s) => $s->trans('name'))->implode(', ');
                    $databases = $technicalSkills->where('category', 'database')->map(fn($s) => $s->trans('name'))->implode(', ');
                    $tools = $technicalSkills->where('category', 'tools')->map(fn($s) => $s->trans('name'))->implode(', ');
                    $soft = $softSkills->map(fn($s) => $s->trans('name'))->implode(' • ');
                @endphp

                @if($langs)
                    <div class="flex flex-col sm:flex-row sm:items-baseline gap-1 sm:gap-2">
                        <span class="font-mono text-xs uppercase font-bold text-stone-900 sm:w-48 shrink-0">
                            {{ $targetLocale === 'id' ? 'Bahasa Pemrograman:' : 'Programming Languages:' }}
                        </span>
                        <span>{{ $langs }}</span>
                    </div>
                @endif

                @if($frameworks)
                    <div class="flex flex-col sm:flex-row sm:items-baseline gap-1 sm:gap-2">
                        <span class="font-mono text-xs uppercase font-bold text-stone-900 sm:w-48 shrink-0">
                            {{ $targetLocale === 'id' ? 'Framework & Arsitektur UI:' : 'Frameworks & Systems:' }}
                        </span>
                        <span>{{ $frameworks }}</span>
                    </div>
                @endif

                @if($databases)
                    <div class="flex flex-col sm:flex-row sm:items-baseline gap-1 sm:gap-2">
                        <span class="font-mono text-xs uppercase font-bold text-stone-900 sm:w-48 shrink-0">
                            {{ $targetLocale === 'id' ? 'Basis Data & Penyimpanan:' : 'Databases & Storage:' }}
                        </span>
                        <span>{{ $databases }}</span>
                    </div>
                @endif

                @if($tools)
                    <div class="flex flex-col sm:flex-row sm:items-baseline gap-1 sm:gap-2">
                        <span class="font-mono text-xs uppercase font-bold text-stone-900 sm:w-48 shrink-0">
                            {{ $targetLocale === 'id' ? 'Cloud, DevOps & Otomasi CI/CD:' : 'Cloud, DevOps & Tools:' }}
                        </span>
                        <span>{{ $tools }}</span>
                    </div>
                @endif

                @if($soft)
                    <div class="flex flex-col sm:flex-row sm:items-baseline gap-1 sm:gap-2">
                        <span class="font-mono text-xs uppercase font-bold text-stone-900 sm:w-48 shrink-0">
                            {{ $targetLocale === 'id' ? 'Kepemimpinan Arsitektural & Manajerial:' : 'Leadership & Architecture:' }}
                        </span>
                        <span>{{ $soft }}</span>
                    </div>
                @endif
            </div>
        </section>

        <!-- 3. Professional Experience -->
        <section class="mt-6 space-y-4">
            <h2 class="text-xs font-mono font-bold tracking-widest uppercase text-[#1C1917] border-b border-stone-300 pb-1 flex items-center justify-between">
                <span>{{ $targetLocale === 'id' ? 'Pengalaman Kerja Profesional' : 'Professional Work Experience' }}</span>
                <span class="text-[10px] text-stone-400 font-normal">ATS SECTION 03</span>
            </h2>
            <div class="space-y-5">
                @foreach($experiences as $exp)
                    <div class="space-y-1.5">
                        <div class="flex flex-col sm:flex-row sm:items-baseline justify-between">
                            <div>
                                <span class="font-bold text-sm sm:text-base text-stone-900 uppercase">
                                    {{ $exp->trans('role') }}
                                </span>
                                <span class="text-xs sm:text-sm text-stone-700 font-semibold">
                                    &bull; {{ $exp->company }}
                                </span>
                            </div>
                            <span class="font-mono text-xs text-stone-600 shrink-0">
                                {{ $exp->start_date }} – {{ $exp->end_date }} | {{ $exp->location ?? 'Remote' }}
                            </span>
                        </div>
                        
                        @if($exp->trans('description'))
                            <p class="text-xs text-stone-700 italic">
                                {{ $exp->trans('description') }}
                            </p>
                        @endif

                        @php
                            $highlights = $exp->trans('highlights');
                        @endphp

                        @if(!empty($highlights) && is_array($highlights))
                            <ul class="list-disc list-outside pl-5 text-xs sm:text-sm text-stone-800 space-y-1">
                                @foreach($highlights as $hl)
                                    <li>{{ $hl }}</li>
                                @endforeach
                            </ul>
                        @endif

                        @if(!empty($exp->technologies) && is_array($exp->technologies))
                            <p class="text-[11px] text-stone-600 font-mono pt-0.5">
                                <span class="font-semibold text-stone-800">Stack:</span> {{ implode(', ', $exp->technologies) }}
                            </p>
                        @endif

                        @if($exp->certificate_url)
                            <p class="text-[11px] text-stone-600 font-mono">
                                <span class="font-semibold text-stone-800">Verified Credential:</span> 
                                <a href="{{ $exp->certificate_url }}" target="_blank" class="underline hover:text-black">{{ $exp->certificate_url }}</a>
                            </p>
                        @endif
                    </div>
                @endforeach
            </div>
        </section>

        <!-- 4. Education & Academic Credentials -->
        <section class="mt-6 space-y-3">
            <h2 class="text-xs font-mono font-bold tracking-widest uppercase text-[#1C1917] border-b border-stone-300 pb-1 flex items-center justify-between">
                <span>{{ $targetLocale === 'id' ? 'Pendidikan & Kualifikasi Akademik' : 'Education & Academic Credentials' }}</span>
                <span class="text-[10px] text-stone-400 font-normal">ATS SECTION 04</span>
            </h2>
            <div class="space-y-4">
                @foreach($education as $edu)
                    <div class="space-y-1">
                        <div class="flex flex-col sm:flex-row sm:items-baseline justify-between">
                            <div>
                                <span class="font-bold text-sm text-stone-900">
                                    {{ $edu->trans('degree') }}
                                </span>
                                <span class="text-xs text-stone-700 font-semibold">
                                    — {{ $edu->trans('field_of_study') }}
                                </span>
                            </div>
                            <span class="font-mono text-xs text-stone-600 shrink-0">
                                {{ $edu->start_year }} – {{ $edu->end_year }}
                            </span>
                        </div>
                        <p class="text-xs text-stone-700">
                            {{ $edu->institution }} 
                            @if($edu->grade) &bull; <span class="font-semibold text-stone-900">{{ $edu->grade }}</span> @endif
                        </p>
                        @if($edu->trans('description'))
                            <p class="text-xs text-stone-600">
                                {{ $edu->trans('description') }}
                            </p>
                        @endif

                        @php
                            $achievements = $edu->trans('achievements');
                        @endphp

                        @if(!empty($achievements) && is_array($achievements))
                            <ul class="list-disc list-outside pl-5 text-xs text-stone-700 space-y-0.5 pt-0.5">
                                @foreach($achievements as $ach)
                                    <li>{{ $ach }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                @endforeach
            </div>
        </section>

        <!-- 5. Key Engineering Projects -->
        @if($projects->isNotEmpty())
            <section class="mt-6 space-y-3">
                <h2 class="text-xs font-mono font-bold tracking-widest uppercase text-[#1C1917] border-b border-stone-300 pb-1 flex items-center justify-between">
                    <span>{{ $targetLocale === 'id' ? 'Portofolio Rekayasa & Proyek Pilihan' : 'Featured Engineering Projects' }}</span>
                    <span class="text-[10px] text-stone-400 font-normal">ATS SECTION 05</span>
                </h2>
                <div class="space-y-4">
                    @foreach($projects as $proj)
                        <div class="space-y-1">
                            <div class="flex flex-col sm:flex-row sm:items-baseline justify-between">
                                <span class="font-bold text-sm text-stone-900 uppercase">
                                    {{ $proj->trans('title') }}
                                </span>
                                <span class="font-mono text-xs text-stone-600">
                                    {{ $proj->trans('category') }}
                                </span>
                            </div>
                            @if($proj->trans('tagline'))
                                <p class="text-xs font-medium text-stone-700 italic">
                                    {{ $proj->trans('tagline') }}
                                </p>
                            @endif
                            <p class="text-xs text-stone-800 leading-relaxed">
                                {{ $proj->trans('description') }}
                            </p>
                            @if(!empty($proj->technologies) && is_array($proj->technologies))
                                <p class="text-[11px] text-stone-600 font-mono">
                                    <span class="font-semibold text-stone-800">Stack:</span> {{ implode(', ', $proj->technologies) }}
                                </p>
                            @endif
                            <div class="text-[11px] font-mono text-stone-600 flex flex-wrap gap-x-4 pt-0.5">
                                @if($proj->github_url) 
                                    <span>Code: <a href="{{ $proj->github_url }}" target="_blank" class="underline hover:text-black">{{ $proj->github_url }}</a></span> 
                                @endif
                                @if($proj->website_url) 
                                    <span>Live: <a href="{{ $proj->website_url }}" target="_blank" class="underline hover:text-black">{{ $proj->website_url }}</a></span> 
                                @endif
                                @if($proj->certificate_url) 
                                    <span>Credential: <a href="{{ $proj->certificate_url }}" target="_blank" class="underline hover:text-black">{{ $proj->certificate_url }}</a></span> 
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif

    </div>

</div>

<script>
    function copyAtsSection(section, label) {
        let textareaId = 'ats-raw-text';
        if (section === 'bio') textareaId = 'ats-raw-bio';
        else if (section === 'education') textareaId = 'ats-raw-education';
        else if (section === 'experience') textareaId = 'ats-raw-experience';
        else if (section === 'projects') textareaId = 'ats-raw-projects';
        else if (section === 'skills') textareaId = 'ats-raw-skills';

        const el = document.getElementById(textareaId);
        if (!el) return;

        const text = el.value;
        navigator.clipboard.writeText(text).then(() => {
            const indicator = document.getElementById('toast-indicator');
            if (indicator) {
                indicator.innerText = `Copied ${label}!`;
                indicator.classList.remove('hidden');
                setTimeout(() => {
                    indicator.classList.add('hidden');
                }, 2500);
            }
        });
    }

    function copyAtsContent() {
        copyAtsSection('all', 'Full Resume');
        const btnText = document.getElementById('copy-btn-text');
        if (btnText) {
            btnText.innerText = 'Copied!';
            setTimeout(() => {
                btnText.innerText = 'Copy Full Text';
            }, 2500);
        }
    }

    function downloadAtsTxt() {
        const text = document.getElementById('ats-raw-text').value;
        const blob = new Blob([text], { type: 'text/plain;charset=utf-8' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        const lang = '{{ $targetLocale }}';
        a.download = `resume-ats-${lang}.txt`;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
    }
</script>
@endsection
