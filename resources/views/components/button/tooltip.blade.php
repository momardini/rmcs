@props(['slug' => 'default'])
<div id="tooltip-{{$slug}}" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(501px, -230px);">
    {{ $slot }}
    <div class="tooltip-arrow" data-popper-arrow="" style="position: absolute; left: 0px; transform: translate(59px, 0px);"></div>
</div>
