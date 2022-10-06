@props([
    'id' => null,
    'placeholder' => null,

])

<div>
    <select  class="select2" {{ $attributes }} placeholder="{{$placeholder}}" multiple="multiple">
        {{ $slot }}
    </select>

</div>
