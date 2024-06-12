<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex text-center justify-center items-center px-8 py-4 bg-orange-100 border border-transparent rounded-lg font-semibold text-xl text-orange-700 uppercase hover:bg-orange-400 focus:bg-orange-300 active:bg-orange-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
