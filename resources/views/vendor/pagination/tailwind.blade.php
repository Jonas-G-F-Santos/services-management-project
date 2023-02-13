@if ($paginator->hasPages())
    <div >

        
        <!-- <div>
            <p class="text-sm text-gray-700 leading-5">
                {!! __('Mostrando') !!}
                @if ($paginator->firstItem())
                    <span class="font-medium">{{ $paginator->firstItem() }}</span>
                    {!! __('a') !!}
                    <span class="font-medium">{{ $paginator->lastItem() }}</span>
                @else
                    {{ $paginator->count() }}
                @endif
                {!! __('dos') !!}
                <span class="font-medium">{{ $paginator->total() }}</span>
                {!! __('resultados') !!}
            </p>
        </div>  -->

        @if($paginator->currentPage() > 2)
            <a href="{{$paginator->url(1)}}" >
                1...
            </a>
        @endif

        {{-- Previous Page Link --}}
        @if (!$paginator->onFirstPage())
        <a href="{{ $paginator->previousPageUrl() }}">
            <strong><</strong>
        </a>
        @endif

        {{-- Pagination Elements --}}
        
        @foreach ($elements as $element)
            
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    
                    @if($page == $paginator->currentPage())
                        <span>{{$page}}</span>
                    @elseif($page == $paginator->currentPage() - 1 || $page == $paginator->currentPage() + 1)
                        <a href="{{ $url }}"> 
                        {{ $page }}
                        </a>
                    @endif
                @endforeach
            
            @endif
       
        @endforeach

        {{-- Next Page Link --}}

   
        @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}">
            <strong>></strong>
        </a>
        @endif

        @if($paginator->currentPage()  < $paginator->lastPage() - 1)

            <a href="{{$paginator->url( $paginator->lastPage())}}">
                ...{{$paginator->lastpage()}}
            </a>

        @endif

        
</div>
@endif
