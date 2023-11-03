<div class="flex space-x-5">
    <x-nav-link wire:navigate
        href="{{ route('login') }}"
        :active="request()->routeIs('dashboard')">
        {{ __('Login') }}
    </x-nav-link>
    <x-nav-link wire:navigate
        href="{{ route('register') }}"
        :active="request()->routeIs('register')">
        {{ __('Register') }}
    </x-nav-link>
</div>