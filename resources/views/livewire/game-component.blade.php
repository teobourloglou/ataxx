<div class="relative min-h-[70vh] gap-4 grid grid-cols-12 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg bg-gradient-to-r from-red-950 via-gray-900 to-blue-950 p-4">

    @unless($gameStarted)
        <div class="flex flex-col items-center justify-start col-span-6 gap-6 py-16">
            <h2 class="text-4xl font-bold text-white">PLAYER 1</h2>
            <input wire:model='playerOneName' placeholder="ENTER YOUR NAME" type="text" class="w-1/2 text-lg text-white bg-black border-2 border-yellow-600 bg-opacity-30 placeholder:text-white">
        </div>
        <div class="absolute flex flex-col items-center justify-center w-full top-3/4">
            <button wire:click='startGame()' class="text-3xl text-white drop-shadow-xl animate-pulse">PRESS HERE TO START GAME</button>
        </div>
        <div class="flex flex-col items-center justify-start col-span-6 gap-6 py-16">
            <h2 class="text-4xl font-bold text-white">PLAYER 2</h2>
            <input wire:model='playerTwoName' placeholder="ENTER YOUR NAME" type="text" class="w-1/2 text-lg text-white bg-black border-2 border-yellow-600 bg-opacity-30 placeholder:text-white">
        </div>
    @else
        <div class="flex flex-col justify-between col-span-3">
            <div class="flex flex-col items-center justify-center w-full py-4 border-2 bg-emerald-700 border-emerald-600 ring-2 ring-red-700">
                <h2 class="text-4xl font-bold text-white">{{ $playerOneName }}</h2>
                <h2 class="text-4xl font-bold text-white">{{ $playerOnePoints }}</h2>
            </div>
            @if($currentPlayer == 1)
                <div class="w-full">
                    <h2 class="font-bold animate-pulse">
                        <div class="text-5xl text-center text-red-700">RED</div>
                        <div class="text-3xl text-center text-neutral-200">to Play</div>
                    </h2>
                </div>
            @endif
            <div class="flex items-center justify-center py-1 bg-black border-2 border-red-950 ring-2 ring-red-800">
                <h2 class="text-5xl font-bold text-white">{{ $playerOneCellsCount }}</h2>
            </div>
        </div>
        <div class="flex flex-col items-center justify-start col-span-6 gap-2">

            <div class="flex w-full flex-col items-center justify-center gap-0.5 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-amber-800 to-yellow-700 border-4 border-yellow-700 ring-2 ring-yellow-800">
                @foreach($board as $row)

                    <div wire:key='"row" + $row' class="flex justify-center gap-0.5 w-full">

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
            <div class="flex flex-col items-center justify-center w-full py-4 border-2 bg-emerald-700 border-emerald-600 ring-2 ring-blue-700">
                <h2 class="text-4xl font-bold text-white">{{ $playerTwoName }}</h2>
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
                <h2 class="text-5xl font-bold text-white">{{ $playerTwoCellsCount }}</h2>
            </div>
        </div>

    
        <div class="flex justify-center col-span-full">
            <button wire:click='exitGame()' class="text-xl text-white opacity-50 drop-shadow-xl">EXIT</button>
        </div>
    @endunless

</div>
