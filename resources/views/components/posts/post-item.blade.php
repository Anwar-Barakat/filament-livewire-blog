@props(['post'])
<article class="[&:not(:last-child)]:border-b border-gray-100 pb-10">
    <div class="article-body grid grid-cols-12 gap-3 mt-5 items-start">
        <div class="article-thumbnail col-span-4 flex items-center">
            <a wire:navigate href="{{ route('blog.show',['post'=>$post]) }}">
                <img class="mw-100 mx-auto rounded-xl shadow-lg" src="{{ $post->image }}" alt="thumbnail">

            </a>
        </div>
        <div class="col-span-8">
            <div class="article-meta flex py-1 text-sm items-center">
                <x-posts.author :author="$post->author" size="sm" />
                <span class="text-gray-500 text-xs">. {{ $post->published_at->diffForHumans() }}</span>
            </div>
            <h2 class="text-xl font-bold text-gray-900">
                <a wire:navigate href="{{ route('blog.show',['post'=>$post]) }}">
                    {{ $post->title }}
                </a>
            </h2>

            <p class="mt-2 text-base text-gray-700 font-light">
                {{ $post->getExcerpt() }}
            </p>
            <div class="article-actions-bar mt-6 flex items-center justify-between">
                <div class="flex gap-3 items-start flex-col">
                    <div class="flex gap-1 flex-wrap">
                        @forelse ($post->categories as $category)
                        <x-badge wire:navigate href="{{ route('blog.index',['category'=>$category->slug]) }}" wire:navigate :textColor="$category->text_color" :bgColor="$category->bg_color">
                            {{ $category->title }}
                        </x-badge>
                        @empty
                        @endforelse
                    </div>

                    <div class="text-gray-500 text-sm">{{ $post->getReadingTime() }} min read.</div>
                </div>
                <div>
                    <livewire:like-button :key="$post->id.now()" :$post />
                </div>
            </div>
        </div>
    </div>
</article>
