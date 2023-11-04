@props(['post'])
<div>
    <a href="http://127.0.0.1:8000/blog/laravel-34">
        <div>
            <img class="w-full rounded-xl" src="{{ $post->image }}">
        </div>
    </a>
    <div class="mt-3">
        <div class="flex items-center mb-2 gap-2">
            <div class="flex gap-1 flex-wrap">
                @forelse ($post->categories()->inRandomOrder()->take(2)->get() as $category)
                <x-badge wire:navigate href="{{ route('blog',['category'=>$category->slug]) }}" wire:navigate :textColor="$category->text_color" :bgColor="$category->bg_color">
                    {{ $category->title }}
                </x-badge>
                @empty
                @endforelse
            </div>

            <p class="text-gray-500 text-sm">{{ $post->published_at }}</p>
        </div>
        <a class="text-xl font-bold text-gray-900">{{ $post->title }}</a>
    </div>

</div>
