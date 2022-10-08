<button
    {{ $attributes->merge([
        'type' => 'button',
        'class' => 'bg-blue-500 hover:bg-blue-800 text-white font-bold py-2 px-2 rounded inline-flex items-center' . ($attributes->get('disabled') ? ' opacity-75 cursor-not-allowed' : ''),
    ]) }}
>
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
    </svg>
    <span>{{ $slot }}</span>
</button>

