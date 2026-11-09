{{-- Blade Presentation --}}
@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-center gap-1.5">
        @if ($paginator->onFirstPage())
            <span class="rounded-full w-9 h-9 flex items-center justify-center text-slate-300 cursor-not-allowed text-sm">
                &lsaquo;
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="rounded-full w-9 h-9 flex items-center justify-center text-slate-700 hover:bg-slate-200 transition-colors text-sm">
                &lsaquo;
            </a>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="rounded-full w-9 h-9 flex items-center justify-center text-slate-400 text-sm">
                    {{ $element }}
                </span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span aria-current="page" class="rounded-full w-9 h-9 flex items-center justify-center bg-emerald-600 text-white font-medium text-sm">
                            {{ $page }}
                        </span>
                    @else
                        <a href="{{ $url }}" class="rounded-full w-9 h-9 flex items-center justify-center text-slate-700 hover:bg-slate-200 text-sm font-medium transition-colors">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="rounded-full w-9 h-9 flex items-center justify-center text-slate-700 hover:bg-slate-200 transition-colors text-sm">
                &rsaquo;
            </a>
        @else
            <span class="rounded-full w-9 h-9 flex items-center justify-center text-slate-300 cursor-not-allowed text-sm">
                &rsaquo;
            </span>
        @endif
    </nav>
@endif
