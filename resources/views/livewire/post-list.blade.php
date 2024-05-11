<div class="px-3 lg:px-7 py-6">
    <div class="flex justify-between items-center border-b border-gray-100">
        <div class="text-gray-800">
            @if ($search)
                Hasil Pencarian Untuk <span>"{{ $search }}"</span>
            @endif
        </div>
        <div class="flex items-center space-x-4 font-light">
            <button class="{{ $sort === 'desc' ? 'text-gray-900 border-b border-red-500' : 'text-gray-500' }} py-4"
                wire:click="setSort('desc')">
                Latest
            </button>
            <button class="{{ $sort === 'asc' ? 'text-gray-900 border-b border-red-500' : 'text-gray-500' }} py-4"
                wire:click="setSort('asc')">
                Oldest
            </button>
        </div>
    </div>
    <div class="py-4">
        @foreach ($this->posts as $post)
            <x-posts.post-item :post="$post" />
        @endforeach
    </div>

    {{-- Untuk membuat list atau geser keseluruhan isi web, di paling bawah ada page 1,2 3 dst --}}
    <div class="my-3">
        {{ $this->posts->onEachSide(1)->links() }}
    </div>
</div>
