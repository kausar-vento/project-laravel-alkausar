{{-- <div class="row">
    <div class="col-lg-12 text-center">
        <div class="pagination-wrap">
            <ul>
                <li><a href="#">Prev</a></li>
                <li><a href="#">1</a></li>
                <li><a class="active" href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">Next</a></li>
            </ul>
        </div>
    </div>
</div> --}}

@if ($paginator->hasPages())
    <div class="row">
        <div class="col-lg-12 text-center">
            <div class="pagination-wrap">
                <ul>
                    @if ($paginator->onFirstPage())
                        <li class="disabled" aria-disabled="true">
                            <span aria-hidden="true">&lsaquo;</span>
                        </li>
                    @else
                        <li><a href="{{ $paginator->previousPageUrl() }}">Prev</a></li>
                    @endif
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                            @if (is_string($element))
                                <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                            @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="active" aria-current="page"><span>{{ $page }}</span></li>
                                @else
                                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                    @if ($paginator->hasMorePages())
                    <li><a href="{{ $paginator->nextPageUrl() }}">Next</a></li>
                    @else
                    <li class="disabled" aria-disabled="true">
                        <span aria-hidden="true">&rsaquo;</span>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
@endif
