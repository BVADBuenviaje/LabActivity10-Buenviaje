{{-- Blade Presentation --}}
@extends('layouts.app')

@section('title', 'Barangay Bulletin - Purok Buenviaje')

@section('content')
<div class="space-y-6">
    <div>
        <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Barangay Bulletin - Purok Buenviaje</h1>
    </div>

    <form method="GET" action="{{ route('posts.index') }}" class="flex flex-col sm:flex-row gap-3">
        <div class="flex-1">
            <input
                type="text"
                name="q"
                value="{{ request('q') }}"
                placeholder="Search title..."
                class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:outline-hidden focus:ring-1 focus:ring-emerald-500 focus:border-emerald-500 text-sm bg-white text-slate-900 placeholder-slate-400"
            >
        </div>
        <div class="sm:w-56">
            <select
                name="category"
                class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:outline-hidden focus:ring-1 focus:ring-emerald-500 focus:border-emerald-500 text-sm bg-white text-slate-900"
            >
                <option value="">All Categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category }}" {{ request('category') === $category ? 'selected' : '' }}>
                        {{ $category }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="flex items-center gap-2">
            <button
                type="submit"
                class="w-full sm:w-auto px-5 py-2 bg-emerald-600 hover:bg-emerald-700 text-white font-medium text-sm rounded-lg transition-colors cursor-pointer"
            >
                Filter
            </button>
            @if(request('q') || request('category'))
                <a
                    href="{{ route('posts.index') }}"
                    class="px-4 py-2 text-slate-600 hover:text-slate-900 text-sm font-medium transition-colors"
                >
                    Clear
                </a>
            @endif
        </div>
    </form>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($posts as $post)
            <a href="{{ url('/posts/' . $post->id) }}" class="block bg-white border border-slate-200 rounded-lg p-5 hover:border-emerald-500 transition-colors flex flex-col group">
                <div class="flex items-center justify-between gap-2 mb-3">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800">
                        {{ $post->category }}
                    </span>
                    @if ($post->is_pinned)
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-amber-100 text-amber-800">
                            Pinned
                        </span>
                    @endif
                </div>

                <h2 class="text-lg font-bold text-slate-900 group-hover:text-emerald-600 transition-colors mb-2">
                    {{ $post->title }}
                </h2>

                <p class="text-sm text-slate-600 line-clamp-3 mb-4 flex-1">
                    {{ $post->body }}
                </p>

                <div class="pt-3 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
                    <span>{{ $post->published_at ? $post->published_at->format('M d, Y') : 'Draft' }}</span>
                    <span>{{ $post->views }} {{ Str::plural('view', $post->views) }}</span>
                </div>
            </a>
        @empty
            <div class="col-span-full py-12 text-center bg-white border border-slate-200 rounded-lg">
                <p class="text-slate-600 font-medium">No posts match your search.</p>
                @if(request('q') || request('category'))
                    <a href="{{ route('posts.index') }}" class="inline-block mt-3 text-sm text-emerald-600 hover:text-emerald-700 font-semibold underline">
                        View all posts
                    </a>
                @endif
            </div>
        @endforelse
    </div>

    <div class="pt-4 flex justify-center">
        {{ $posts->links('pagination.custom') }}
    </div>
</div>
@endsection
