<div class="relative text-white min-h-[70vh] gap-4 grid grid-cols-12 overflow-hidden sm:rounded-lg p-4">

    <div class="flex flex-col justify-between col-span-3">
        <div class="flex flex-col items-center justify-center w-full py-4 border-2 border-yellow-600 ring-2 ring-yellow-700">
            <h2 class="text-4xl font-bold text-white">{{ strtoupper($playerOneName) }}</h2>
            <h2 class="text-4xl font-bold text-white">{{ $playerOnePoints }}</h2>
        </div>
        @if($currentPlayer == 1)
            <div class="w-full">
                         <div class="text-5xl text-center text-red-700">RED</div>
                    <div class="text-3xl text-center text-neutral-200">to Play</div>
                </h2>
            </div>
        @endif
        <div class="flex items-center justify-center py-1 bg-black border-2 border-red-950 ring-2 ring-red-800">
            <h2 class="text-5xl font-bold text-white">{{ str_pad($playerOneCellsCount, 2, "0", STR_PAD_LEFT) }}</h2>
        </div>
    </div>
    <div class="flex flex-col items-center justify-start col-span-6 gap-2">

        <div class="flex flex-col items-center justify-center w-full gap-2 p-2 border-2 border-yellow-600 ring-2 ring-yellow-700">
            @foreach($board as $row)

                <div wire:key='"row" + $row' class="flex justify-center w-full gap-2">

                    @foreach($row as $column)

                        <div wire:key='"row" + $row + "column" + $column' class="w-full grow">
                            <x-game.cell :value="$column" />
                        </div>

                    @endforeach

                </div>

            @endforeach
        </div>

    </div>
    <div class="flex flex-col justify-between col-span-3">
        <div class="flex flex-col items-center justify-center w-full py-4 border-2 border-yellow-600 ring-2 ring-yellow-700">
            <h2 class="text-4xl font-bold text-white">{{ strtoupper($playerTwoName) }}</h2>
            <h2 class="text-4xl font-bold text-white">{{ $playerTwoPoints }}</h2>
        </div>
        @if($currentPlayer == 2)
            <div class="w-full">
                <h2 class="font-bold animate-pulse">
                    <div class="text-5xl text-center text-blue-700">BLUE</div>
                    <div class="text-3xl text-center text-neutral-200">to Play</div>
                </h2>
            </div>
        @endif
        <div class="flex items-center justify-center py-1 bg-black border-2 border-blue-950 ring-2 ring-blue-800">
            <h2 class="text-5xl font-bold text-white">{{ str_pad($playerTwoCellsCount, 2, "0", STR_PAD_LEFT) }}</h2>
        </div>
    </div>

    <div class="flex justify-center col-span-full">
        <button wire:click='exitGame()' class="text-xl text-white opacity-75 drop-shadow-xl">EXIT</button>
    </div>

</div>
