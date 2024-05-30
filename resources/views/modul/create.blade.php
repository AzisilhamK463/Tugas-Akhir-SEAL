<x-app-layout>
    @slot('title')
        {{ __('Create a Modul') }}
    @endslot

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create a Modul') }}
        </h2>
    </x-slot>

    <x-container class="flex flex-row items-center justify-center">
        <x-card class="w-1/2 mb-10">
            <x-card.header>
                <x-card.title>
                    {{ __('Create a Modul') }}
                </x-card.title>
                <x-card.description>
                    {{ __('Please fill in the form below to create a new modul.') }}
                </x-card.description>
            </x-card.header>
            <x-card.content>
                <form action="{{ route('modul.store') }}" method="post" enctype="multipart/form-data" class="[&>div]:mb-6" novalidate>
                    @csrf
                    <div>
                        <x-input-label for="file" :value="__('File Modul')" />
                        <x-text-input id="file" class="block mt-1" type="file" name="file" :value="old('file')" required />
                        <x-input-error :messages="$errors->get('file')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1" type="text" name="name" :value="old('name')" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="description" :value="__('Description')" />
                        <x-textarea id="description" class="block mt-1" name="description" :value="old('description')" required />
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>
                    <x-primary-button type="submit">
                        {{ __('Create Modul') }}
                    </x-primary-button>
                </form>
            </x-card.content>
        </x-card>
    </x-container>
</x-app-layout>
