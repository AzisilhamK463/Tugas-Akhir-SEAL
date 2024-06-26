<x-app-layout>
    @slot('title')
        {{ __('Landing Page') }}
    @endslot

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Landing Page') }}
        </h2>
    </x-slot>

    <x-container class="px-6">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                {{ __('Welcome to our website!') }}
            </div>
        </div>
    </x-container>
</x-app-layout>
