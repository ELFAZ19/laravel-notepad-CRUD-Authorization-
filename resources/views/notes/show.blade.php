<x-app-layout :title="$title">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 p-4">
        <!-- Back button placed outside the card but aligned left -->
        <div class="mb-4">
            <x-amber-btn-link :href="route('note.index')" class="inline-flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor"
                    class="w-4 h-4 inline-block mr-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18.75 4.5L11.25 12l7.5 7.5" />
                </svg>
                Back
            </x-amber-btn-link>
        </div>

        <div class="w-full mx-auto bg-white dark:bg-gray-800 shadow-md rounded-md overflow-hidden">
            <div class="p-6">
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">
                    {{ $note->title }}
                </h2>
                <p class="text-gray-600 dark:text-gray-300 mt-2">
                    {{ $note->body }}
                </p>
            </div>
            <div class="flex justify-end p-4 bg-gray-100 dark:bg-gray-700">
                <x-cyan-btn-link class="mr-2" :href="route('note.edit', $note)">
    Edit
</x-cyan-btn-link>

<div x-data="{ open: false }" class="inline-block">
    <!-- Button triggers modal -->
    <x-danger-button @click.prevent="open = true">
        Delete
    </x-danger-button>

    <!-- Modal -->
    <div
        x-show="open"
        x-cloak
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
        @keydown.escape.window="open = false"
    >
        <div
            class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg max-w-md w-full"
            @click.away="open = false"
        >
            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-2">
                Confirm Deletion
            </h2>
            <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">
                Are you sure you want to delete this Note? This action cannot be undone.
            </p>
            <div class="flex justify-end space-x-2">
                <button
                    @click="open = false"
                    class="px-4 py-2 bg-gray-300 dark:bg-gray-600 text-gray-800 dark:text-white rounded hover:bg-gray-400 dark:hover:bg-gray-500"
                >
                    Cancel
                </button>
                <form method="POST" action="{{ route('note.destroy', $note) }}">
                    @csrf
                    @method('delete')
                    <button
                        type="submit"
                        class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700"
                    >
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


            </div>
        </div>
    </div>
</x-app-layout>
