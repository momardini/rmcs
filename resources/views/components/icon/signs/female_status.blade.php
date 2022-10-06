@props(
    [
        'pregnant'=>false,
        'breastfeeding'=>false
]
)
<div class="flex">
    @if($pregnant)
        <img src="{{url('/storage/resource/pregnant.gif')}}" class="h-6 w-6" />
        @endif
    @if($breastfeeding)
            <img src="{{url('/storage/resource/breastfeeding.gif')}}" class="h-6 w-6"/>
        @endif

</div>
