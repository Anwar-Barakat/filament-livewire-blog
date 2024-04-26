    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form wire:submit.prevent='submit'>
           <div class="mt-4">

                <x-label for="name" value="{{ __('Title') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" wire:model="form.title" :value="old('name')"  autofocus autocomplete="title" />
            </div>
           <div class="mt-4">

                <x-label for="slug" value="{{ __('Slug') }}" />
                <x-input id="slug" class="block mt-1 w-full" type="text" wire:model="form.slug" :value="old('slug')"  autofocus autocomplete="slug" />
            </div>

            <div class="mt-4">
                <x-label for="body" value="{{ __('body') }}" />
                <x-input id="body" class="block mt-1 w-full" type="text" wire:model="form.body" :value="old('body')"  autocomplete="body" />
            </div>

            <div class="mt-4">
                <x-label for="published_at" value="{{ __('published_at') }}" />
                <x-input id="published_at" class="block mt-1 w-full" type="date" wire:model="form.published_at" autocomplete="published_at" />

            </div>

            <div class="mt-4">
                <x-label for="image" value="{{ __('Image') }}" />
                <input type="file" wire:model='form.image' id="image" class="mt-1 w-full focus:outline-none focus:border-none focus:ring-0 outline-none border-none text-xs text-gray-800 placeholder:text-gray-400 bg-gray-100 block">
            </div>


            <div class="flex items-center justify-end mt-4">
                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>

