<x-app-layout :title="$title">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 p-4">
       @session('success')
<div 
    x-data="{ isOpen: true }" 
    x-show="isOpen" 
    x-init="setTimeout(() => isOpen = false, 5000)" 
    x-cloak
    class="relative flex flex-col sm:flex-row sm:items-center bg-gray-300 dark:bg-green-700 shadow rounded-md py-5 pl-6 pr-8 sm:pr-6 mb-3 mt-3"
>
    <div class="flex flex-row items-center border-b sm:border-b-0 w-full sm:w-auto pb-4 sm:pb-0">
        <div class="text-green-500 dark:text-gray-300">
            <svg class="w-6 sm:w-5 h-6 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>
        <div class="text-sm font-medium ml-3 dark:text-gray-100">Success!</div>
    </div>
    
    <div class="text-sm tracking-wide text-gray-500 dark:text-white mt-4 sm:mt-0 sm:ml-4">
        {{ session('success') }}
    </div>
    
    <div 
        @click="isOpen = false" 
        class="absolute sm:relative sm:top-auto sm:right-auto ml-auto right-4 top-4 text-gray-400 hover:text-gray-800 dark:hover:text-gray-200 cursor-pointer"
    >
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    </div>
</div>
@endsession

        <!-- Header: Title + Create button -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-4xl font-extrabold text-gray-900 dark:text-gray-100">
                {{ __('Notes') }}
            </h2>
            
            {{-- <a href="{{ route('note.create') }}" 
               class="items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs 
                      dark:text-gray-800 uppercase tracking-widest 
                      dark:hover:bg-green-400 
                      active:bg-green-900 
                      focus:ring-2 
                      dark:focus:ring-offset-gray-800 
                      transition ease-in-out duration-150 
                      inline-flex 
                      dark:bg-green-500/100 
                      text-white 
                      hover:bg-green-700 
                      focus:bg-green-700 
                      dark:focus:bg-green 
                      dark:active:bg-gray-300 
                      focus:outline-none 
                      focus:ring-indigo-500 
                      focus:ring-offset-2">
                Create
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>

            </a> --}}
            <x-create-button :href="route('note.create')" text="Create Note" />

        </div>

        <!-- Notes Table -->
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 mt-6 mb-5">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">ID</th>
                    <th scope="col" class="px-6 py-3">Title</th>
                    <th scope="col" class="px-6 py-3">Body</th>
                    <th scope="col" class="px-6 py-3">Created At</th>
                    <th scope="col" class="px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($notes as $note)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $note->id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $note->title }}
                        </td>
                        <td class="px-6 py-4">
                            {{ Str::limit($note->body, 20) }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $note->created_at->diffForHumans() }}
                        </td>
                        <td class="px-6 py-4 flex items-center space-x-2">
                            <!--view icon-->
                            <a href="{{ route('note.show', $note->id) }}" class="text-blue-600 hover:text-yellow-900 dark:text-blue-400 dark:hover:text-yellow-300">
                                
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            </a>

                            <!-- Edit icon -->
                            <a href="{{ route('note.edit', $note->id) }}" class="text-blue-600 hover:text-yellow-900 dark:text-blue-400 dark:hover:text-yellow-300">

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                            </a>
                            <!-- Delete icon -->
                           <div x-data="{ open: false }" class="relative">
    <button @click="open = true"
        class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">
        <!-- Delete icon -->
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
             stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21
                     c.342.052.682.107 1.022.166m-1.022-.165L18.16
                     19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25
                     2.25 0 0 1-2.244-2.077L4.772 5.79m14.456
                     0a48.108 48.108 0 0 0-3.478-.397m-12
                     .562c.34-.059.68-.114 1.022-.165m0
                     0a48.11 48.11 0 0 1 3.478-.397m7.5
                     0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964
                     51.964 0 0 0-3.32 0c-1.18.037-2.09
                     1.022-2.09 2.201v.916m7.5 0a48.667
                     48.667 0 0 0-7.5 0" />
        </svg>
    </button>

    <!-- Confirmation Modal -->
    <div x-show="open" x-cloak 
         class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg max-w-md w-full">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-2">
                Confirm Deletion
            </h2>
            <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">
                Are you sure you want to delete this note? This action cannot be undone.
            </p>
            <div class="flex justify-end space-x-2">
                <button @click="open = false"
                        class="px-4 py-2 bg-gray-300 dark:bg-gray-600 text-gray-800 dark:text-white rounded hover:bg-gray-400 dark:hover:bg-gray-500">
                    Cancel
                </button>
                <form method="POST" action="{{ route('note.destroy', $note) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

                            
                        </td>
                    </tr>
                @empty
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500 dark:text-gray-300">
                            No notes found!
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $notes->links() }}
        </div>
    </div>
</x-app-layout>
