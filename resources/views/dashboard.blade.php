<x-app-layout>
    <form method="POST" action="{{ route('shorten.store') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Long Url')" />
            <x-text-input id="long_url" class="block mt-1 w-full" type="text" name="long_url" :value="old('long_url')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('long_url')" class="mt-2" />
        </div>
        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ __('Shorten Url') }}
            </x-primary-button>
        </div>
    </form>
</x-app-layout>
