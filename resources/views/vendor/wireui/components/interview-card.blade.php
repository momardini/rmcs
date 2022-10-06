<div class="{{ $cardClasses }}  flex flex-col {{ $shadow }} {{ $rounded }} {{ $color }} ">
    @if ($header)
        {{ $header }}
    @elseif ($title || $action)
        <div class="px-4 py-2.5 flex @if($action) justify-between @else justify-center @endif items-center border-b dark:border-0 bg-{{ $color }}-500 rounded-t-md">
            <h3 class="text-md tex font-medium text-white dark:text-secondary-400 whitespace-normal">{{ $title }}</h3>

            @if ($action)
                {{ $action }}
            @endif
        </div>
    @endif

    <div {{ $attributes->merge(['class' => "{$padding} text-secondary-700 dark:text-secondary-400 grow bg-cool-gray-100"]) }}>
        {{ $slot }}
    </div>

    @if ($footer)
        <div class="px-4 py-4 sm:px-6 bg-secondary-50 rounded-t-none dark:bg-secondary-800
                    border-t dark:border-secondary-600 {{ $rounded }}">
            {{ $footer }}
        </div>
    @endif
</div>
