@props(['isOn'])
<button {{ $attributes }} type="button"
        class="flex-shrink-0 group relative rounded-full inline-flex items-center justify-center h-3 w-10 cursor-pointer focus:outline-none"
        role="switch" aria-checked="false">
    <span aria-hidden="true" class="pointer-events-none absolute w-full h-full rounded-md"></span>
    <span aria-hidden="true"
          class="{{ $isOn ? 'bg-green-600 border-gray' : 'bg-red-600 border-gray' }} border-[2px] pointer-events-none absolute h-5 w-9 mx-auto rounded-full transition ease-in-out duration-200"></span>
    <span aria-hidden="true"
          class=" {{ $isOn ? 'translate-x-5 bg-white' : 'translate-x-1.5 bg-white' }} pointer-events-none absolute left-0 inline-block h-3.5 w-3.5 rounded-full transform ring-0 transition ease-in-out duration-200"></span>
</button>
