@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination">
        <div class="flex justify-center gap-2 mt-6">
            @if ($paginator->onFirstPage())
                <span class="px-4 py-2 bg-gray-100 text-gray-400 rounded-lg cursor-not-allowed">
                    &laquo;
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="px-4 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                    &laquo;
                </a>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <span class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg">{{ $element }}</span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="px-4 py-2 bg-blue-600 text-white rounded-lg">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="px-4 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="px-4 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                    &raquo;
                </a>
            @else
                <span class="px-4 py-2 bg-gray-100 text-gray-400 rounded-lg cursor-not-allowed">
                    &raquo;
                </span>
            @endif
        </div>
    </nav>
@endif
