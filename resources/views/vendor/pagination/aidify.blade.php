@if ($paginator->hasPages())
    <nav class="aidify-pagination BYekan" dir="rtl">
        {{-- دکمه قبلی --}}
        @if ($paginator->onFirstPage())
            <span class="page-link disabled">&laquo;</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="page-link">&laquo;</a>
        @endif

        {{-- صفحات --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="page-link disabled">{{ $element }}</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="page-link active">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- دکمه بعدی --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="page-link">&raquo;</a>
        @else
            <span class="page-link disabled">&raquo;</span>
        @endif
    </nav>
@endif
