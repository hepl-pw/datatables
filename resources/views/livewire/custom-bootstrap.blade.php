<div>
    <!-- TODO : remember state !! -->
    @if ($paginator->hasPages())
        <nav>
            <h2 class="sr-only">Pagination</h2>
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <span class="page-link" aria-hidden="true">&lsaquo;</span>
                    </li>
                @else
                    <li class="page-item">
                        <a href="{{$paginator->previousPageUrl()}}" dusk="previousPage" class="page-link"
                           wire:click.prevent="previousPage" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="page-item disabled"
                            aria-disabled="true"><span
                                class="page-link">{{ $element }}</span></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active"
                                    wire:key="paginator-page-{{ $page }}"
                                    aria-current="page">
                                    <span class="page-link">{{ $page }}</span></li>
                            @else
                                <li class="page-item" wire:key="paginator-page-{{ $page }}">
                                    <a href="{{$paginator->url($page)}}"
                                       class="page-link"
                                       wire:click.prevent="gotoPage({{ $page }})">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a href="{{$paginator->nextPageUrl()}}"
                           dusk="nextPage"
                           class="page-link"
                           wire:click.prevent="nextPage"
                           rel="next"
                           aria-label="@lang('pagination.next')">&rsaquo;
                        </a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                        <span class="page-link" aria-hidden="true">&rsaquo;</span>
                    </li>
                @endif
            </ul>
        </nav>
    @endif
</div>
