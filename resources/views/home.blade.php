<x-app-layout title="Home Page">

    @section('hero')
    <div class="w-full text-center py-32">
        <h1 class="text-2xl md:text-3xl font-bold text-center lg:text-5xl text-gray-700">
            Welcome to <span class="text-orange-500">BLOG</span> <span class="text-gray-900"> News</span>
        </h1>
        <p class="text-gray-500 text-lg mt-1">Best Blog in the universe</p>
        <a class="px-3 py-2 text-lg text-white bg-gray-800 rounded mt-5 inline-block" href="http://127.0.0.1:8000/blog">
            Start
            Reading</a>
    </div>
    @endsection

    <main class="container mx-auto px-5 flex flex-grow">
        <div class="mb-10">
            <div class="mb-16 w-full">
                <h2 class="mt-16 mb-5 text-3xl text-orange-500 font-bold">Featured Posts</h2>
                <div class="w-full">
                    <div class="grid grid-cols-3 gap-10 w-full">
                        @forelse ($featuredPosts as $featuredPost)
                        <x-posts.post-card :post="$featuredPost" class="md:col-span-1 col-span-3" />
                        @empty
                        <h1>Not Results Found!!</h1>
                        @endforelse
                    </div>
                </div>
                <a class="mt-10 block text-center text-lg text-orange-500 font-semibold" href="http://127.0.0.1:8000/blog">More Posts</a>
            </div>
            <hr>

            <h2 class="mt-16 mb-5 text-3xl text-orange-500 font-bold">Latest Posts</h2>
            <div class="w-full mb-5">
                <div class="grid grid-cols-3 gap-10 gap-y-32 w-full">
                    @forelse ($latestPosts as $latestPost)
                    <x-posts.post-card :post="$latestPost" class="md:col-span-1 col-span-3" />
                    @empty
                    <h1>Not Results Found!!</h1>
                    @endforelse

                </div>
            </div>
            <a class="mt-10 block text-center text-lg text-orange-500 font-semibold" href="http://127.0.0.1:8000/blog">More Posts</a>
        </div>
    </main>

</x-app-layout>
