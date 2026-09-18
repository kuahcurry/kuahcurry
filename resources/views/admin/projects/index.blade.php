@extends('layouts.admin')

@section('title', 'Projects Manager')

@section('content')
<div class="space-y-6">

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b border-[#E8E5DC] pb-4">
        <div>
            <h1 class="font-serif text-3xl font-bold text-[#1C1917]">Featured Projects</h1>
            <p class="text-sm text-[#57534E] mt-1">
                Manage your showcased engineering projects, source repository links, and live demonstration URLs.
            </p>
        </div>
        <div>
            <a href="{{ route('admin.projects.create') }}" class="px-4 py-2.5 rounded-lg bg-[#1C1917] text-[#FAF9F6] text-xs font-mono font-medium hover:bg-[#322F2D] transition flex items-center gap-2 shadow-xs">
                <span class="material-symbols-outlined text-sm">add_circle</span>
                <span>Create New Project</span>
            </a>
        </div>
    </div>

    <!-- Projects Table -->
    <div class="bg-white rounded-2xl border border-[#E8E5DC] overflow-hidden shadow-xs">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-[#FAF9F6] border-b border-[#E8E5DC] text-xs font-mono uppercase text-[#78716C]">
                    <tr>
                        <th class="px-6 py-4">Project</th>
                        <th class="px-6 py-4">Category</th>
                        <th class="px-6 py-4">Links</th>
                        <th class="px-6 py-4">Featured</th>
                        <th class="px-6 py-4">Order</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#F4F2EB]">
                    @forelse($projects as $p)
                        <tr class="hover:bg-[#FAF9F6]/60 transition">
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-3">
                                    @if($p->thumbnail)
                                        <img src="{{ $p->thumbnail }}" alt="{{ $p->title }}" class="w-12 h-8 rounded object-cover border border-[#E8E5DC]">
                                    @else
                                        <div class="w-12 h-8 rounded bg-[#F4F2EB] border border-[#E8E5DC] flex items-center justify-center text-xs text-[#78716C]">
                                            N/A
                                        </div>
                                    @endif
                                    <div>
                                        <div class="font-semibold text-[#1C1917]">{{ $p->title }}</div>
                                        <div class="text-xs text-[#78716C] font-mono line-clamp-1">{{ $p->tagline }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-xs font-mono text-[#57534E]">
                                {{ $p->category }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-2 text-xs">
                                    @if($p->github_url)
                                        <a href="{{ $p->github_url }}" target="_blank" class="p-1 rounded bg-[#FAF9F6] border border-[#E8E5DC] text-[#1C1917] hover:border-[#1C1917]" title="Git Repo">
                                            <span class="material-symbols-outlined text-sm">code</span>
                                        </a>
                                    @endif
                                    @if($p->website_url)
                                        <a href="{{ $p->website_url }}" target="_blank" class="p-1 rounded bg-[#FAF9F6] border border-[#E8E5DC] text-[#8F6A3B] hover:border-[#8F6A3B]" title="Live Website">
                                            <span class="material-symbols-outlined text-sm">open_in_new</span>
                                        </a>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                @if($p->is_featured)
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-[11px] font-mono bg-amber-50 text-amber-800 border border-amber-200">
                                        Featured
                                    </span>
                                @else
                                    <span class="text-xs text-[#78716C] font-mono">&mdash;</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-xs font-mono text-[#78716C]">
                                {{ $p->sort_order }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end space-x-2">
                                    <a href="{{ route('admin.projects.edit', $p) }}" class="p-1.5 rounded hover:bg-[#F4F2EB] text-[#57534E] hover:text-[#1C1917]" title="Edit">
                                        <span class="material-symbols-outlined text-base">edit</span>
                                    </a>
                                    <form action="{{ route('admin.projects.destroy', $p) }}" method="POST" onsubmit="return confirm('Are you sure you wish to delete this project?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1.5 rounded hover:bg-rose-50 text-rose-600" title="Delete">
                                            <span class="material-symbols-outlined text-base">delete</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-[#78716C] italic font-mono text-xs">
                                No projects recorded yet. Click "Create New Project" to add one.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
