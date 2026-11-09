{{-- Blade Presentation --}}
@extends('layouts.app')

@section('title', $post->title . ' - Barangay Bulletin - Purok Buenviaje')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <div>
        <a href="{{ route('posts.index') }}" class="inline-flex items-center gap-1.5 text-sm font-medium text-emerald-600 hover:text-emerald-700 transition-colors">
            &larr; Back to all announcements
        </a>
    </div>

    <article class="bg-white rounded-2xl border border-slate-200 shadow-xs p-6 sm:p-8">
        <header class="border-b border-slate-100 pb-6 mb-6">
            <div class="flex items-center gap-2 mb-4">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800">
                    {{ $post->category }}
                </span>
                @if ($post->is_pinned)
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-amber-100 text-amber-800">
                        Pinned
                    </span>
                @endif
            </div>

            <h1 class="text-2xl sm:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">
                {{ $post->title }}
            </h1>

            <div class="mt-4 flex flex-wrap items-center gap-4 text-xs sm:text-sm text-slate-500">
                <span>Published {{ $post->published_at ? $post->published_at->format('F d, Y') : 'Draft' }}</span>
                <span>&bull;</span>
                <span>{{ $post->views }} {{ Str::plural('view', $post->views) }}</span>
            </div>
        </header>

        <div class="text-slate-700 leading-relaxed whitespace-pre-line">
            {{ $post->body }}
        </div>
    </article>
</div>
@endsection
