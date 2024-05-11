<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-2 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-gray-700 active:bg-red-900 focus:outline-none  transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
