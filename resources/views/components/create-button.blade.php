@props([
    'href',
    'text' => 'Create',
])

<a href="{{ $href }}" 
   {{ $attributes->merge(['class' => 'items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs 
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
                           focus:ring-offset-2']) }}>
    {{ $text }}
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 ml-2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
    </svg>
</a>
