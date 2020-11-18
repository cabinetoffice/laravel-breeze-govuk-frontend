@if ($paginator->hasPages())
<nav role="navigation" aria-label="Pagination">
    <ul class="pagination">

    @if ($paginator->onFirstPage())
        <li class="pagination__item disabled"><span aria-hidden="true" role="presentation">&laquo;</span> Previous</li>
    @else
        <li class="pagination__item"><a class="pagination__link govuk-link--no-visited-state" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous page"><span aria-hidden="true" role="presentation">&laquo;</span> Previous</a></li>
    @endif


    @foreach ($elements as $element)
        @if (is_string($element))
            <li class="pagination__item disabled"><span>{{ $element }}</span></li>
        @endif

        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="pagination__item"><a class="pagination__link govuk-link--no-visited-state current" href="{{ $url }}" aria-current="true" aria-label="Page {{$page}}, current page">{{$page}}</a></li>
                @else
                    <li class="pagination__item"><a class="pagination__link govuk-link--no-visited-state" href="{{ $url }}" aria-label="Page {{$page}}">{{$page}}</a></li>
                @endif
            @endforeach
        @endif
    @endforeach


    @if ($paginator->hasMorePages())
        <li class="pagination__item"><a class="pagination__link govuk-link--no-visited-state" href="{{ $paginator->nextPageUrl() }}" aria-label="Next page">Next <span aria-hidden="true" role="presentation">&raquo;</span></a></li>
    @else
        <li class="pagination__item disabled">Next <span aria-hidden="true" role="presentation">&raquo;</span></li>
    @endif
    </ul>
</nav>
@endif
