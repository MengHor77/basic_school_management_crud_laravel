@if ($paginator && $paginator->hasPages())
<div class="bg-green-600 p-3 shrink-0 mt-4">
    <div class="flex flex-col md:flex-row justify-between items-center text-white text-sm">

        <div class="mb-2 md:mb-0">
            Showing <span class="font-semibold">{{ $paginator->firstItem() }}</span> to
            <span class="font-semibold">{{ $paginator->lastItem() }}</span> of
            <span class="font-semibold">{{ $paginator->total() }}</span> results
        </div>

        <div class="flex items-center gap-1">
            @if ($paginator->onFirstPage())
                <span class="px-3 py-1 rounded bg-green-700 text-gray-300 cursor-not-allowed">&laquo;</span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="px-3 py-1 rounded bg-green-700 hover:bg-green-800">&laquo;</a>
            @endif

            @foreach ($paginator->getUrlRange(1, $paginator->lastPage()) as $page => $url)
                @if ($page == $paginator->currentPage())
                    <span class="px-3 py-1 rounded bg-white text-green-700 font-semibold">{{ $page }}</span>
                @else
                    <a href="{{ $url }}" class="px-3 py-1 rounded bg-green-700 hover:bg-green-800">{{ $page }}</a>
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="px-3 py-1 rounded bg-green-700 hover:bg-green-800">&raquo;</a>
            @else
                <span class="px-3 py-1 rounded bg-green-700 text-gray-300 cursor-not-allowed">&raquo;</span>
            @endif
        </div>

    </div>
</div>
@endif
