<div class="md:col-span-3 col-span-4">
    <div id="posts" class=" px-3 lg:px-7 py-6">
        <div class="flex justify-between items-center border-b border-gray-100">
            <div class="text-gray-600 flex justify-between items-start flex-col gap-1 mb-4">
                @if ($this->activeCategory || $search)
                <x-button class="bg-red-600 text-white mb-2" wire:click='clearFilters'>Clear Filters</x-button>
                @endif

                <div class="flex items-center gap-4">
                    @if ($this->activeCategory)
                    <x-badge wire:navigate href="{{ route('blog.index',['category'=>$this->activeCategory->slug]) }}" wire:navigate :textColor="$this->activeCategory->text_color" :bgColor="$this->activeCategory->bg_color">
                        {{ $this->activeCategory->title }}
                    </x-badge>
                    @endif
                    @if ($search)
                    <span>Containing : <strong>({{ $search }})</strong></span>
                    @endif
                </div>
            </div>
            <div id="filter-selector" class="flex items-center space-x-6 font-light">
                <div class="flex items-center gap-3">
                    <x-checkbox wire:model.live='popular' />
                    <x-label>Popular</x-label>
                </div>
                <div class="flex items-center gap-4">
                    <button class="text-gray-500 py-4 {{ $this->sort ==='desc' ? 'border-b border-gray-700 text-gray-900' :'' }}" wire:click="setSort('desc')">Latest</button>
                    <button class="text-gray-500 py-4 {{ $this->sort ==='asc' ? 'border-b border-gray-700 text-gray-900' :'' }} " wire:click="setSort('asc')">Oldest</button>
                </div>
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
            {{ $this->posts->onEachSide(1)->links('livewire::custom-pacgination') }}
        </div>
    </div>
</div>
