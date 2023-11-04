<div class="md:col-span-3 col-span-4">
    <div id="posts" class=" px-3 lg:px-7 py-6">
        <div class="flex justify-between items-center border-b border-gray-100">
            <div class="text-gray-600">
                {{ $search ? "Searching ({$search})" : "" }}
            </div>
            <div id="filter-selector" class="flex items-center space-x-4 font-light ">
                <button class="text-gray-500 py-4 {{ $this->sort ==='desc' ? 'border-b border-gray-700 text-gray-900' :'' }}" wire:click="setSort('desc')">Latest</button>
                <button class="text-gray-500 py-4 {{ $this->sort ==='asc' ? 'border-b border-gray-700 text-gray-900' :'' }} " wire:click="setSort('asc')">Oldest</button>
            </div>
        </div>
        <div class="py-4">
            @forelse ($this->posts as $post)
            <x-posts.post-item :post=$post />
            @empty
            <h1>Not Result Found!!</h1>
            @endforelse
        </div>

        <div class="my-3">
            {{ $this->posts->onEachSide(1)->links() }}
        </div>
    </div>
</div>
