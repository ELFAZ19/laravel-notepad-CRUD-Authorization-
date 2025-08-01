<a {{ $attributes->merge([
    'class' => '
        inline-flex items-center 
        px-4 py-2 mt-4 mb-2 
        bg-amber-500 
        border border-transparent 
        rounded-md 
        font-semibold text-xs 
        text-white dark:text-gray-800 
        uppercase tracking-widest 
        hover:bg-amber-600 dark:hover:bg-amber-300 
        focus:bg-amber-300 dark:focus:bg-amber-300 
        focus:outline-none focus:ring-2 
        focus:ring-indigo-500 focus:ring-offset-2 
        dark:focus:ring-offset-amber-300 
        transition ease-in-out duration-150
    '
]) }}>
    {{ $slot }}
</a>
