@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex flex-col sm:flex-row items-center justify-between gap-4 w-full">
        <!-- Results Summary -->
        <div class="text-xs sm:text-sm text-slate-500 font-medium order-2 sm:order-1 text-center sm:text-left">
            បង្ហាញពី <span class="font-bold text-slate-800">{{ $paginator->firstItem() }}</span> ដល់ <span class="font-bold text-slate-800">{{ $paginator->lastItem() }}</span> នៃ <span class="font-bold text-slate-800">{{ $paginator->total() }}</span> សៀវភៅ
        </div>

        <!-- Page Buttons -->
        <div class="inline-flex items-center gap-1.5 order-1 sm:order-2 flex-wrap justify-center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="inline-flex items-center justify-center px-3.5 py-2 text-xs font-semibold text-slate-300 bg-slate-50 rounded-xl border border-slate-200 cursor-not-allowed select-none">
                    <svg class="w-4 h-4 mr-1 inline" style="width: 16px; height: 16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    ថយក្រោយ
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="inline-flex items-center justify-center px-3.5 py-2 text-xs font-semibold text-slate-700 bg-white rounded-xl border border-slate-200 hover:bg-slate-50 hover:text-sky-600 transition-colors shadow-2xs">
                    <svg class="w-4 h-4 mr-1 inline" style="width: 16px; height: 16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    ថយក្រោយ
                </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="inline-flex items-center justify-center w-9 h-9 text-xs font-bold text-slate-400 select-none">
                        {{ $element }}
                    </span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span aria-current="page" class="inline-flex items-center justify-center w-9 h-9 text-xs font-bold text-white bg-sky-600 rounded-xl shadow-xs">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}" class="inline-flex items-center justify-center w-9 h-9 text-xs font-semibold text-slate-700 bg-white rounded-xl border border-slate-200 hover:bg-slate-50 hover:text-sky-600 transition-colors shadow-2xs">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="inline-flex items-center justify-center px-3.5 py-2 text-xs font-semibold text-slate-700 bg-white rounded-xl border border-slate-200 hover:bg-slate-50 hover:text-sky-600 transition-colors shadow-2xs">
                    បន្ទាប់
                    <svg class="w-4 h-4 ml-1 inline" style="width: 16px; height: 16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            @else
                <span class="inline-flex items-center justify-center px-3.5 py-2 text-xs font-semibold text-slate-300 bg-slate-50 rounded-xl border border-slate-200 cursor-not-allowed select-none">
                    បន្ទាប់
                    <svg class="w-4 h-4 ml-1 inline" style="width: 16px; height: 16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </span>
            @endif
        </div>
    </nav>
@endif
