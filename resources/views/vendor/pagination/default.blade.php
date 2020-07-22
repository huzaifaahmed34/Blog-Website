
      
                                
                            <!--======ENDPAGINATION======-->
                            @if ($paginator->hasPages())
                               <nav class="blog-pagination justify-content-center d-flex">
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled page-item" > <a href="#" class="page-link" aria-label="Previous"> <span aria-hidden="true">
                                                <span class="lnr lnr-chevron-left"></span>
                                            </span></a></li>
        @else
            <li class="page-item" aria-label="Prev">
                <a href="{{ $paginator->previousPageUrl() }}"  class="page-link"  rel="prev">   <span aria-hidden="true">
                                                <span class="lnr lnr-chevron-left"></span>
                                            </span></a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled page-item"><a href="#" class="page-link">{{$element}}</a></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active  page-item"><a href="#" class="page-link">{{$page}}</a></li>
                    @else
                        <li><a href="{{ $url }}"  class="page-link">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li  class="page-item"><a href="{{ $paginator->nextPageUrl() }}" class="page-link" rel="next">  <span aria-hidden="true">
                                                <span class="lnr lnr-chevron-right"></span>
                                            </span></a></li>
        @else
            <li class="disabled page-item"> <a href="#" class="page-link" aria-label="Previous"> <span aria-hidden="true">
                                                <span class="lnr lnr-chevron-right"></span>
                                            </span></a></li>
        @endif
    </ul>
</nav>
@endif

