@if ($paginator->hasPages())
    {{-- <nav class="d-flex justify-items-center justify-content-between">
        <div class="d-flex justify-content-between flex-fill d-sm-none"> --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="pagination_wrap">
                <ul>
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <li aria-disabled="true" aria-label="@lang('pagination.previous')">
                            <a aria-hidden="true">&lsaquo;</a>
                        </li>
                    @else
                        <li>
                            <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                                aria-label="@lang('pagination.previous')">&lsaquo;</a>
                        </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li aria-disabled="true"><a>{{ $element }}</a></li>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="active" aria-current="page"><a>{{ $page }}</a></li>
                                @else
                                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li>
                            <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                                aria-label="@lang('pagination.next')">&rsaquo;</a>
                        </li>
                    @else
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                            <a aria-hidden="true">&rsaquo;</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
@endif
