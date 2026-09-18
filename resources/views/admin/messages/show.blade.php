@extends('layouts.admin')

@section('title', 'Inquiry: ' . $message->subject)

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    
    <div class="flex items-center justify-between border-b border-[#E8E5DC] pb-4">
        <div>
            <h1 class="font-serif text-3xl font-bold text-[#1C1917]">Inquiry Details</h1>
            <p class="text-sm text-[#57534E] mt-1">Received from <span class="font-semibold text-[#1C1917]">{{ $message->name }}</span> &bull; {{ $message->created_at->format('F d, Y \a\t H:i') }}</p>
        </div>
        <a href="{{ route('admin.messages.index') }}" class="text-xs font-mono text-[#78716C] hover:text-[#1C1917]">
            &larr; Back to Inquiries
        </a>
    </div>

    <div class="bg-white rounded-2xl border border-[#E8E5DC] p-6 sm:p-10 space-y-8 shadow-xs">
        
        <!-- Metadata Header -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 border-b border-[#F4F2EB] pb-6">
            <div>
                <span class="text-xs font-mono uppercase text-[#78716C]">Sender Name</span>
                <p class="font-serif text-lg font-bold text-[#1C1917]">{{ $message->name }}</p>
            </div>
            <div>
                <span class="text-xs font-mono uppercase text-[#78716C]">Email Address</span>
                <p class="font-mono text-sm text-[#8F6A3B] font-semibold">{{ $message->email }}</p>
            </div>
            <div>
                <span class="text-xs font-mono uppercase text-[#78716C]">Engagement Type</span>
                <p class="text-sm font-medium text-[#1C1917]">{{ $message->project_type ?? 'Unspecified' }}</p>
            </div>
            <div>
                <span class="text-xs font-mono uppercase text-[#78716C]">Budget Scope</span>
                <p class="text-sm font-medium text-[#1C1917]">{{ $message->budget ?? 'Flexible / Unspecified' }}</p>
            </div>
            @if($message->ip_address)
                <div class="sm:col-span-2">
                    <span class="text-xs font-mono uppercase text-[#78716C]">IP Address</span>
                    <p class="text-xs font-mono text-[#57534E]">{{ $message->ip_address }}</p>
                </div>
            @endif
        </div>

        <!-- Subject -->
        <div>
            <span class="text-xs font-mono uppercase text-[#78716C]">Subject / Scope</span>
            <h2 class="font-serif text-xl font-bold text-[#1C1917] mt-1">{{ $message->subject }}</h2>
        </div>

        <!-- Full Message Body -->
        <div class="p-6 rounded-xl bg-[#FAF9F6] border border-[#E8E5DC] space-y-2">
            <span class="text-xs font-mono uppercase tracking-wider text-[#78716C] block mb-2 font-semibold">Message Content:</span>
            <div class="text-sm text-[#1C1917] leading-relaxed whitespace-pre-line font-sans">
                {{ $message->message }}
            </div>
        </div>

        <!-- Actions: Reply via mailto, Delete -->
        <div class="pt-4 border-t border-[#F4F2EB] flex flex-wrap items-center justify-between gap-4">
            <a href="mailto:{{ $message->email }}?subject=Re: {{ rawurlencode($message->subject) }}" class="px-6 py-2.5 rounded-lg bg-[#1C1917] text-[#FAF9F6] font-medium text-xs font-mono hover:bg-[#322F2D] transition shadow-xs flex items-center gap-2">
                <span class="material-symbols-outlined text-sm">reply</span>
                <span>Compose Reply via Email</span>
            </a>

            <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Are you sure you wish to delete this inquiry?');" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2.5 rounded-lg border border-rose-200 text-rose-700 hover:bg-rose-50 font-mono text-xs transition flex items-center gap-1.5">
                    <span class="material-symbols-outlined text-sm">delete</span>
                    <span>Delete Message</span>
                </button>
            </form>
        </div>

    </div>

</div>
@endsection
