@props(['post'])

<div {{ $attributes }}>
    <a wire:navigate href="{{ route('blog.show',['post'=>$post]) }}">
        <div>
            <img class="w-full rounded-xl" src="{{ $post->image }}">
        </div>
    </a>
    <div class="mt-3">
        <div class="flex items-center mb-2 gap-2">
            <div class="flex gap-1 flex-wrap">
                @forelse ($post->categories()->inRandomOrder()->take(2)->get() as $category)
                <x-posts.category-badge :category="$category" />
                @empty
                @endforelse
            </div>

            <p class="text-gray-500 text-sm">{{ $post->published_at }}</p>
        </div>
        <a wire:navigate href="{{ route('blog.show',['post'=>$post]) }}" class="text-xl font-bold text-gray-900">{{ $post->title }}</a>
    </div>

</div>
