@extends('layouts.admin')

@section('title', 'Overview Dashboard')

@section('content')
<div class="space-y-8">

    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b border-[#E8E5DC] pb-6">
        <div>
            <h1 class="font-serif text-3xl font-bold text-[#1C1917]">Management Overview</h1>
            <p class="text-sm text-[#57534E] mt-1">
                Portfolio content control center for <span class="font-semibold text-[#1C1917]">{{ $profile->name ?? 'Alexander Vance' }}</span>.
            </p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.projects.create') }}" class="px-3.5 py-2 rounded-lg bg-[#1C1917] text-[#FAF9F6] text-xs font-mono font-medium hover:bg-[#322F2D] transition flex items-center gap-1.5 shadow-xs">
                <span class="material-symbols-outlined text-sm">add_circle</span>
                <span>Add Project</span>
            </a>
            <a href="{{ route('admin.profile.edit') }}" class="px-3.5 py-2 rounded-lg bg-white border border-[#D5D1C6] text-[#1C1917] text-xs font-mono font-medium hover:bg-[#F4F2EB] transition flex items-center gap-1.5">
                <span class="material-symbols-outlined text-sm">edit</span>
                <span>Edit Bio</span>
            </a>
        </div>
    </div>

    <!-- Stat Cards (6 Grid) -->
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
        <a href="{{ route('admin.projects.index') }}" class="p-5 rounded-xl bg-white border border-[#E8E5DC] portfolio-card-hover block text-decoration-none">
            <span class="text-xs font-mono uppercase text-[#78716C]">Projects</span>
            <p class="text-3xl font-serif font-bold text-[#1C1917] mt-2">{{ $stats['projects_count'] }}</p>
            <span class="text-[11px] text-[#8F6A3B] font-mono mt-1 block">Manage &rarr;</span>
        </a>

        <a href="{{ route('admin.experiences.index') }}" class="p-5 rounded-xl bg-white border border-[#E8E5DC] portfolio-card-hover block text-decoration-none">
            <span class="text-xs font-mono uppercase text-[#78716C]">Experience</span>
            <p class="text-3xl font-serif font-bold text-[#1C1917] mt-2">{{ $stats['experiences_count'] }}</p>
            <span class="text-[11px] text-[#8F6A3B] font-mono mt-1 block">Timeline &rarr;</span>
        </a>

        <a href="{{ route('admin.education.index') }}" class="p-5 rounded-xl bg-white border border-[#E8E5DC] portfolio-card-hover block text-decoration-none">
            <span class="text-xs font-mono uppercase text-[#78716C]">Education</span>
            <p class="text-3xl font-serif font-bold text-[#1C1917] mt-2">{{ $stats['education_count'] }}</p>
            <span class="text-[11px] text-[#8F6A3B] font-mono mt-1 block">Degrees &rarr;</span>
        </a>

        <a href="{{ route('admin.skills.index') }}" class="p-5 rounded-xl bg-white border border-[#E8E5DC] portfolio-card-hover block text-decoration-none">
            <span class="text-xs font-mono uppercase text-[#78716C]">Tech Skills</span>
            <p class="text-3xl font-serif font-bold text-[#1C1917] mt-2">{{ $stats['skills_count'] }}</p>
            <span class="text-[11px] text-[#8F6A3B] font-mono mt-1 block">Skills &rarr;</span>
        </a>

        <a href="{{ route('admin.messages.index') }}" class="p-5 rounded-xl bg-white border border-[#E8E5DC] portfolio-card-hover block text-decoration-none">
            <span class="text-xs font-mono uppercase text-[#78716C]">Total Inquiries</span>
            <p class="text-3xl font-serif font-bold text-[#1C1917] mt-2">{{ $stats['messages_count'] }}</p>
            <span class="text-[11px] text-[#8F6A3B] font-mono mt-1 block">Inbox &rarr;</span>
        </a>

        <a href="{{ route('admin.messages.index') }}" class="p-5 rounded-xl bg-white border border-[#E8E5DC] portfolio-card-hover block text-decoration-none">
            <span class="text-xs font-mono uppercase text-[#78716C]">Unread</span>
            <p class="text-3xl font-serif font-bold {{ $stats['unread_messages'] > 0 ? 'text-amber-700' : 'text-[#1C1917]' }} mt-2">
                {{ $stats['unread_messages'] }}
            </p>
            <span class="text-[11px] text-[#8F6A3B] font-mono mt-1 block">Pending &rarr;</span>
        </a>
    </div>

    <!-- Two-column Layout: Recent Inquiries & Projects -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <!-- Left: Recent Inquiries (7 cols) -->
        <div class="lg:col-span-7 bg-white rounded-xl border border-[#E8E5DC] p-6 shadow-xs space-y-4">
            <div class="flex items-center justify-between border-b border-[#F4F2EB] pb-3">
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-[#8F6A3B]">mail</span>
                    <h2 class="font-serif text-lg font-bold text-[#1C1917]">Latest Collaboration Inquiries</h2>
                </div>
                <a href="{{ route('admin.messages.index') }}" class="text-xs font-mono text-[#8F6A3B] hover:underline">
                    View All ({{ $stats['messages_count'] }})
                </a>
            </div>

            <div class="divide-y divide-[#F4F2EB]">
                @forelse($recentMessages as $msg)
                    <div class="py-3.5 flex items-start justify-between gap-4">
                        <div class="space-y-1">
                            <div class="flex items-center gap-2">
                                <span class="text-sm font-semibold text-[#1C1917]">{{ $msg->name }}</span>
                                @if(!$msg->is_read)
                                    <span class="px-1.5 py-0.5 rounded bg-amber-100 text-amber-900 text-[10px] font-mono font-medium">NEW</span>
                                @endif
                            </div>
                            <p class="text-xs text-[#57534E] font-medium">{{ $msg->subject }}</p>
                            <p class="text-xs text-[#78716C] line-clamp-1">{{ $msg->message }}</p>
                        </div>
                        <div class="shrink-0 text-right space-y-1">
                            <span class="text-[11px] font-mono text-[#78716C]">{{ $msg->created_at->diffForHumans() }}</span>
                            <div>
                                <a href="{{ route('admin.messages.show', $msg) }}" class="text-xs font-mono text-[#8F6A3B] hover:underline">Read &rarr;</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-xs text-[#78716C] italic py-4 text-center">No collaboration messages yet.</p>
                @endforelse
            </div>
        </div>

        <!-- Right: Quick Projects Overview (5 cols) -->
        <div class="lg:col-span-5 bg-white rounded-xl border border-[#E8E5DC] p-6 shadow-xs space-y-4">
            <div class="flex items-center justify-between border-b border-[#F4F2EB] pb-3">
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-[#8F6A3B]">folder</span>
                    <h2 class="font-serif text-lg font-bold text-[#1C1917]">Featured Works</h2>
                </div>
                <a href="{{ route('admin.projects.index') }}" class="text-xs font-mono text-[#8F6A3B] hover:underline">
                    All Projects
                </a>
            </div>

            <div class="space-y-3">
                @forelse($recentProjects as $p)
                    <div class="p-3 rounded-lg bg-[#FAF9F6] border border-[#E8E5DC] flex items-center justify-between gap-3">
                        <div class="space-y-0.5">
                            <div class="flex items-center gap-2">
                                <span class="text-sm font-semibold text-[#1C1917]">{{ $p->title }}</span>
                                @if($p->is_featured)
                                    <span class="text-xs text-amber-600">&#9733;</span>
                                @endif
                            </div>
                            <p class="text-xs text-[#78716C] font-mono">{{ $p->category }}</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <a href="{{ route('admin.projects.edit', $p) }}" class="p-1.5 rounded hover:bg-white text-[#57534E] hover:text-[#1C1917]" title="Edit Project">
                                <span class="material-symbols-outlined text-base">edit</span>
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-xs text-[#78716C] italic py-4 text-center">No projects in database.</p>
                @endforelse
            </div>
        </div>

    </div>

</div>
@endsection
