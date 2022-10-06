@props([
    'slug' => '',
     'color' => 'purple',
     'route'=>'#'])

<a
    type="button"
    {{ $attributes->merge([
        'data-tooltip-target' => 'tooltip-'.$slug,
        'class' => 'text-white bg-'.$color.'-700 hover:bg-'.$color.'-800 focus:ring-4 focus:outline-none focus:ring-'.$color.'-300 font-medium rounded-lg text-xs px-2 py-2 text-center inline-flex items-center ml-2 dark:bg-'.$color.'-600 dark:hover:bg-'.$color.'-700 dark:focus:ring-'.$color.'-800' . ($attributes->get('disabled') ? ' opacity-75 cursor-not-allowed' : ''),
    ]) }}
    @if($route != '')
        href="{{$route}}"
    @endif
>
    {{ $slot }}
</a>
