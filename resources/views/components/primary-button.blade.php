<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-block px-4 py-2 bg-primary border border-transparent rounded-md font-semibold bg-gray-500 text-base text-white hover:bg-opacity-90 focus:outline-none focus:bg-opacity-90 disabled:opacity-25 transition mt-4 duration-150 ease-in-out']) }}>
    {{ $slot }}
</button>
