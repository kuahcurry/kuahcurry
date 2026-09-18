@extends('layouts.admin')

@section('title', 'Inquiries Inbox')

@section('content')
<div class="space-y-6">

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b border-[#E8E5DC] pb-4">
        <div>
            <h1 class="font-serif text-3xl font-bold text-[#1C1917]">Collaboration Inquiries</h1>
            <p class="text-sm text-[#57534E] mt-1">
                Messages, project briefs, and partnership invitations submitted through the "Work Together" form.
            </p>
        </div>
    </div>

    <!-- Messages Table -->
    <div class="bg-white rounded-2xl border border-[#E8E5DC] overflow-hidden shadow-xs">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-[#FAF9F6] border-b border-[#E8E5DC] text-xs font-mono uppercase text-[#78716C]">
                    <tr>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Sender &amp; Contact</th>
                        <th class="px-6 py-4">Subject &amp; Type</th>
                        <th class="px-6 py-4">Budget Scope</th>
                        <th class="px-6 py-4">Received</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#F4F2EB]">
                    @forelse($messages as $msg)
                        <tr class="hover:bg-[#FAF9F6]/60 transition {{ !$msg->is_read ? 'bg-amber-50/30' : '' }}">
                            <td class="px-6 py-4">
                                @if(!$msg->is_read)
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-mono bg-amber-100 text-amber-900 font-semibold border border-amber-300">
                                        UNREAD
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-mono bg-gray-100 text-gray-600">
                                        READ
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-semibold text-[#1C1917]">{{ $msg->name }}</div>
                                <a href="mailto:{{ $msg->email }}" class="text-xs text-[#8F6A3B] hover:underline font-mono">
                                    {{ $msg->email }}
                                </a>
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-medium text-[#1C1917]">{{ $msg->subject }}</div>
                                @if($msg->project_type)
                                    <div class="text-xs text-[#78716C] font-mono mt-0.5">{{ $msg->project_type }}</div>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-xs font-mono text-[#57534E]">
                                {{ $msg->budget ?? 'Flexible / Unspecified' }}
                            </td>
                            <td class="px-6 py-4 text-xs font-mono text-[#78716C]">
                                {{ $msg->created_at->format('M d, Y H:i') }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end space-x-2">
                                    <a href="{{ route('admin.messages.show', $msg) }}" class="px-3 py-1 rounded bg-[#FAF9F6] border border-[#D5D1C6] text-xs font-mono text-[#1C1917] hover:bg-[#F4F2EB]">
                                        View Details &rarr;
                                    </a>
                                    <form action="{{ route('admin.messages.destroy', $msg) }}" method="POST" onsubmit="return confirm('Are you sure you wish to delete this inquiry?');" class="inline">
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
                                No collaboration inquiries received yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($messages->hasPages())
            <div class="px-6 py-4 border-t border-[#E8E5DC] bg-[#FAF9F6]">
                {{ $messages->links() }}
            </div>
        @endif
    </div>

</div>
@endsection
