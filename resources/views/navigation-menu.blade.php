<nav class="  w-full border-b border-gray-100">
    <div class="mx-auto flex items-center justify-between py-3 px-6   container">
        <div id="nav-left" class="flex items-center">
            <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                <x-application-mark class="block h-9 w-auto" />
            </x-nav-link>
            <div class="top-menu ml-10">
                <div class="flex space-x-4 ">
                    <x-nav-link wire:navigate href="{{ route('home') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Home') }}
                    </x-nav-link>
                    <x-nav-link wire:navigate href="{{ route('blog.index') }}" :active="request()->routeIs('blog')">
                        {{ __('Blog') }}
                    </x-nav-link>
                </div>
            </div>
        </div>
        <div id="nav-right" class="flex items-center md:space-x-6">
            @auth
            @include('layouts.partials.header-right-auth')
            @else
            @include('layouts.partials.header-right-guest')
            @endauth

        </div>
    </div>
</nav>
