<x-app-layout>
    @slot('title')
        {{ __('Modul') }}
    @endslot

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Modul') }}
        </h2>
    </x-slot>

    <x-container class="px-6">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg px-3 py-3">
            <a href="{{ route('modul.create') }}">
                <x-primary-button class="ml-4">
                    {{ __('Create a Modul') }}
                </x-primary-button>
            </a>
            <div class="p-6 text-gray-900 dark:text-gray-100">
                {{ __('Modules :') }}
            </div>
            <div class="grid grid-cols-4 gap-4">
                @foreach ($modul as $item)
                    <x-card class="w-full">
                        <x-card.header>
                            <x-card.title>
                                {{ $item->name }}
                            </x-card.title>
                            <x-card.file-type>
                                {{ $item->file_type }}
                            </x-card.file-type>
                            <x-card.description>
                                {{ $item->description }}
                            </x-card.description>
                            @auth
                                @if ($item->user_id === auth()->user()->id)
                                    <a href="{{ route('modul.edit', $item) }}" class="underline text-blue-500">
                                        {{ __('Edit') }}
                                    </a>
                                @endif
                            @endauth
                        </x-card.header>
                        <x-card.content>
                            <x-preview :item="$item" />
                        </x-card.content>
                    </x-card>
                @endforeach
            </div>
        </div>
    </x-container>
</x-app-layout>
