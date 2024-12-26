@props(['value'])

<div class="p-2 border-2 aspect-square rounded-2xl grow border-emerald-800 shadow-l shadow-yellow-900 ring-1 ring-yellow-600 bg-emerald-700">
    @if($value == 1)
        <div class="w-full h-full bg-red-700 border-2 border-red-900 rounded-full shadow shadow-md cursor-pointer"></div>
    @elseif($value == 2)
        <div class="w-full h-full bg-blue-700 border-2 border-blue-900 rounded-full shadow shadow-md cursor-pointer"></div>
    @endif
</div>