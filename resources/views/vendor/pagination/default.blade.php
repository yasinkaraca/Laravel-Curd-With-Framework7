@if ($paginator->hasPages())
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="disabled">&laquo;</span></li>
        @else
            @if(empty($where) || $where == '')
                <a class="link external" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a>
            @else
                <a class="link" href="#" onclick="findStudents('{{ $where }}', '{{ $column }}', '{{ $asc }}', {{ $page }} - 1)" rel="prev">&laquo;</a>
            @endif
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span class="disabled">{{ $element }}</span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="active">{{ $page }}</span>
                    @else
                        @if(empty($where) || $where == '')
                            <a class="link external" href="{{ $url }}">{{ $page }}</a>
                        @else
                            <a class="link" href="#" onclick="findStudents('{{ $where }}', '{{ $column }}', '{{ $asc }}', '{{ $page }}')">{{ $page }}</a>
                        @endif
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            @if(empty($where) || $where == '')
                <a class="link external" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a>
            @else
                <a class="link" href="#" onclick="findStudents('{{ $where }}', '{{ $column }}', '{{ $asc }}', {{ $page }} + 1)" rel="next">&raquo;</a>
            @endif
        @else
            <span class="disabled">&raquo;</span>
        @endif
@endif
