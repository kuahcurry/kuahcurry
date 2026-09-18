<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Manage Console') — Portfolio Administration</title>

    <!-- Classical Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,600;1,400&family=JetBrains+Mono:wght@400;500&family=Playfair+Display:wght@600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 22;
            vertical-align: middle;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#FAF9F6] text-[#1C1917] antialiased">
    <div class="min-h-screen flex flex-col">
        <!-- Admin Navigation Bar -->
        <header class="bg-[#1C1917] text-[#FAF9F6] border-b border-white/10 sticky top-0 z-40">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <!-- Brand & Subdomain Badge -->
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-2.5 text-white text-decoration-none">
                            <span class="w-8 h-8 rounded bg-white/10 flex items-center justify-center font-serif font-bold text-sm">
                                M
                            </span>
                            <span class="font-serif font-bold tracking-tight text-base">
                                Manage Console
                            </span>
                        </a>
                        <span class="hidden sm:inline-block px-2 py-0.5 rounded bg-white/10 text-[11px] font-mono text-white/70">
                            subdomain: manage.
                        </span>
                    </div>

                    <!-- Primary Admin Nav Links -->
                    <nav class="hidden lg:flex items-center space-x-1 text-sm font-medium">
                        <a href="{{ route('admin.dashboard') }}" class="px-3 py-1.5 rounded-md hover:bg-white/10 text-white/80 hover:text-white transition {{ request()->routeIs('admin.dashboard') ? 'bg-white/10 text-white' : '' }}">
                            Dashboard
                        </a>
                        <a href="{{ route('admin.profile.edit') }}" class="px-3 py-1.5 rounded-md hover:bg-white/10 text-white/80 hover:text-white transition {{ request()->routeIs('admin.profile.*') ? 'bg-white/10 text-white' : '' }}">
                            Profile &amp; Bio
                        </a>
                        <a href="{{ route('admin.projects.index') }}" class="px-3 py-1.5 rounded-md hover:bg-white/10 text-white/80 hover:text-white transition {{ request()->routeIs('admin.projects.*') ? 'bg-white/10 text-white' : '' }}">
                            Projects
                        </a>
                        <a href="{{ route('admin.experiences.index') }}" class="px-3 py-1.5 rounded-md hover:bg-white/10 text-white/80 hover:text-white transition {{ request()->routeIs('admin.experiences.*') ? 'bg-white/10 text-white' : '' }}">
                            Experience
                        </a>
                        <a href="{{ route('admin.education.index') }}" class="px-3 py-1.5 rounded-md hover:bg-white/10 text-white/80 hover:text-white transition {{ request()->routeIs('admin.education.*') ? 'bg-white/10 text-white' : '' }}">
                            Education
                        </a>
                        <a href="{{ route('admin.skills.index') }}" class="px-3 py-1.5 rounded-md hover:bg-white/10 text-white/80 hover:text-white transition {{ request()->routeIs('admin.skills.*') ? 'bg-white/10 text-white' : '' }}">
                            Skills &amp; Tech
                        </a>
                        <a href="{{ route('admin.messages.index') }}" class="px-3 py-1.5 rounded-md hover:bg-white/10 text-white/80 hover:text-white transition {{ request()->routeIs('admin.messages.*') ? 'bg-white/10 text-white' : '' }}">
                            Inquiries
                        </a>
                    </nav>

                    <!-- Right: View Live Site & Logout -->
                    <div class="flex items-center space-x-3">
                        <a href="{{ route('portfolio.index') }}" target="_blank" class="text-xs font-mono text-white/70 hover:text-white px-2.5 py-1 rounded bg-white/5 hover:bg-white/10 flex items-center gap-1">
                            <span>View Site</span>
                            <span class="material-symbols-outlined text-xs">open_in_new</span>
                        </a>

                        <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-xs font-mono text-rose-300 hover:text-rose-200 px-2.5 py-1 rounded bg-rose-500/10 hover:bg-rose-500/20 flex items-center gap-1 transition">
                                <span class="material-symbols-outlined text-xs">logout</span>
                                <span>Logout</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Mobile Sub-Navigation -->
            <div class="lg:hidden border-t border-white/10 overflow-x-auto py-2 px-4 flex items-center space-x-2 text-xs font-medium bg-[#141416]">
                <a href="{{ route('admin.dashboard') }}" class="px-2.5 py-1 rounded {{ request()->routeIs('admin.dashboard') ? 'bg-white/20 text-white' : 'text-white/70' }}">Overview</a>
                <a href="{{ route('admin.profile.edit') }}" class="px-2.5 py-1 rounded {{ request()->routeIs('admin.profile.*') ? 'bg-white/20 text-white' : 'text-white/70' }}">Profile</a>
                <a href="{{ route('admin.projects.index') }}" class="px-2.5 py-1 rounded {{ request()->routeIs('admin.projects.*') ? 'bg-white/20 text-white' : 'text-white/70' }}">Projects</a>
                <a href="{{ route('admin.experiences.index') }}" class="px-2.5 py-1 rounded {{ request()->routeIs('admin.experiences.*') ? 'bg-white/20 text-white' : 'text-white/70' }}">Experience</a>
                <a href="{{ route('admin.education.index') }}" class="px-2.5 py-1 rounded {{ request()->routeIs('admin.education.*') ? 'bg-white/20 text-white' : 'text-white/70' }}">Education</a>
                <a href="{{ route('admin.skills.index') }}" class="px-2.5 py-1 rounded {{ request()->routeIs('admin.skills.*') ? 'bg-white/20 text-white' : 'text-white/70' }}">Skills</a>
                <a href="{{ route('admin.messages.index') }}" class="px-2.5 py-1 rounded {{ request()->routeIs('admin.messages.*') ? 'bg-white/20 text-white' : 'text-white/70' }}">Inquiries</a>
            </div>
        </header>

        <!-- Main Content Area -->
        <main class="flex-grow py-8 md:py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Alerts / Notifications -->
                @if(session('success'))
                    <div class="mb-6 p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-900 text-sm flex items-center gap-2">
                        <span class="material-symbols-outlined text-emerald-600">check_circle</span>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                @if($errors->any())
                    <div class="mb-6 p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-900 text-sm space-y-1">
                        <div class="flex items-center gap-2 font-semibold">
                            <span class="material-symbols-outlined text-rose-600">error</span>
                            <span>Please review the highlighted errors below:</span>
                        </div>
                        <ul class="list-disc list-inside pl-6 text-xs">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </div>
        </main>

        <!-- Admin Footer -->
        <footer class="border-t border-[#E8E5DC] bg-white py-6 text-center text-xs font-mono text-[#78716C]">
            <p>Portfolio Admin Engine &bull; Subdomain Manage Console &bull; SQLite Persistence</p>
        </footer>
    </div>
</body>
</html>
