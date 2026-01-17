@if ($paginator && $paginator->hasPages())
<div class="mt-4 bg-white border rounded-md shadow-sm p-4">
    <div class="flex flex-col md:flex-row justify-between items-center text-gray-700 text-sm">

        {{-- Showing results --}}
        <div class="mb-2 md:mb-0">
            Showing <span class="font-semibold">{{ $paginator->firstItem() }}</span> to
            <span class="font-semibold">{{ $paginator->lastItem() }}</span> of
            <span class="font-semibold">{{ $paginator->total() }}</span> results
        </div>

        {{-- Page links --}}
        <div class="flex items-center gap-1 flex-wrap">

            {{-- Previous Page --}}
            @if ($paginator->onFirstPage())
            <span class="px-3 py-1 rounded bg-gray-200 text-gray-400 cursor-not-allowed">&laquo;</span>
            @else
            <a href="{{ $paginator->previousPageUrl() }}"
                class="px-3 py-1 rounded bg-gray-200 hover:bg-gray-300">&laquo;</a>
            @endif

            {{-- Page numbers --}}
            @foreach ($paginator->getUrlRange(1, $paginator->lastPage()) as $page => $url)
            @if ($page == $paginator->currentPage())
            <span class="px-3 py-1 rounded bg-indigo-600 text-white font-semibold">{{ $page }}</span>
            @else
            <a href="{{ $url }}" class="px-3 py-1 rounded bg-gray-200 hover:bg-gray-300">{{ $page }}</a>
            @endif
            @endforeach

            {{-- Next Page --}}
            @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}"
                class="px-3 py-1 rounded bg-gray-200 hover:bg-gray-300">&raquo;</a>
            @else
            <span class="px-3 py-1 rounded bg-gray-200 text-gray-400 cursor-not-allowed">&raquo;</span>
            @endif

        </div>

    </div>
</div>
@endif