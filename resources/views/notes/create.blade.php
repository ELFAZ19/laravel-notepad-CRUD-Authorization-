<x-app-layout :title="$title">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 p-4">
        <!-- Header Row: Create Note title and Back button -->
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-extrabold text-gray-900 dark:text-gray-100">
                {{ __('Create Note') }}
            </h2>

            <x-amber-btn-link :href="route('note.index')" >
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>    
                Back
            </x-amber-btn-link>
        </div>

        <!-- Form -->
        <form method="post" action="{{ route('note.store') }}" class="space-y-6 max-w-2xl mx-auto">
            @csrf

            <div>
                <x-input-label for="title" :value="__('Title')" />
                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title')" required autofocus autocomplete="title" />
                <x-input-error class="mt-2" :messages="$errors->get('title')" />
            </div>

            <div>
                <x-input-label for="body" :value="__('Body')" />
                <x-textarea-input id="body" name="body" class="mt-1 block w-full">{{ old('body') }}</x-textarea-input>
                <x-input-error class="mt-2" :messages="$errors->get('body')" />
            </div>
            
            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Create') }}</x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
