@props(['value', 'x', 'y'])

<div class="cursor-pointer p-1.5 bg-opacity-25 border-2 border-yellow-800 aspect-square rounded-2xl grow shadow-l shadow-yellow-900 ring-1 ring-yellow-600 {{ in_array([$y, $x], $this->projectionBlocks, true) ? 'bg-white' : 'bg-black' }}">
    @if($value == 1)
        <div wire:click='createMoveProjection({{ $y }}, {{ $x }}, 1)' class="w-full h-full bg-red-700 border-2 border-red-900 rounded-full shadow"></div>
    @elseif($value == 2)
        <div wire:click='createMoveProjection({{ $y }}, {{ $x }}, 2)' class="w-full h-full bg-blue-700 border-2 border-blue-900 rounded-full shadow"></div>
    @else
        <div wire:click='makeMove({{ $y }}, {{ $x }})' class="w-full h-full bg-transparent"></div>
    @endif
</div>