<div class="relative grid w-full grid-cols-3 gap-4 p-4 overflow-hidden text-white sm:rounded-lg">

    <h3 class="text-3xl font-bold text-center text-indigo-200 col-span-full">NEW GAME</h3>

    <div class="flex flex-col items-center justify-start w-full col-span-1 gap-6 py-16">
        <h2 class="text-4xl font-bold text-white">PLAYER 1</h2>

        <h3>SELECT A PLAYER</h3>

        <select wire:model='playerOneId' class="w-full bg-transparent border-2 border-yellow-600 focus:border-yellow-800 focus:ring-yellow-600 bg-opacity-30 placeholder:text-white">
            <option value="">SELECT A PLAYER</option>
            @foreach($players as $player)
                <option value="{{ $player->id }}" wire:key="player-1-{{ $player->id }}">{{ $player->name }}</option>
            @endforeach
        </select>

        <h3>OR CREATE A NEW ONE</h3>

        <input wire:model='playerOneName' placeholder="ENTER YOUR NAME" type="text" class="w-full text-lg text-white bg-black border-2 border-yellow-600 focus:border-yellow-800 focus:ring-yellow-600 bg-opacity-30 placeholder:text-white">

        <div class="font-semibold text-red-400">{{ $playerOneErrorMessage }}</div>
    </div>
    <div class="flex flex-col items-center justify-center w-full">
        <button wire:click='createGame()' class="relative text-3xl text-white top-48 drop-shadow-xl animate-pulse">PRESS HERE TO START GAME</button>
    </div>
    <div class="flex flex-col items-center justify-start w-full col-span-1 gap-6 py-16">
        <h2 class="text-4xl font-bold text-white">PLAYER 2</h2>

        <h3>SELECT A PLAYER</h3>

        <select wire:model='playerTwoId' class="w-full bg-transparent border-2 border-yellow-600 focus:border-yellow-800 focus:ring-yellow-600 bg-opacity-30 placeholder:text-white">
            <option value="">SELECT A PLAYER</option>
            @foreach($players as $player)
                <option value="{{ $player->id }}" wire:key="player-2-{{ $player->id }}">{{ $player->name }}</option>
            @endforeach
        </select>

        <h3>OR CREATE A NEW ONE</h3>

        <input wire:model='playerTwoName' placeholder="ENTER YOUR NAME" type="text" class="w-full text-lg text-white bg-black border-2 border-yellow-600 focus:border-yellow-800 focus:ring-yellow-600 bg-opacity-30 placeholder:text-white">

        <div class="font-semibold text-red-400">{{ $playerTwoErrorMessage }}</div>
    </div>

    <div class="mt-6 col-span-full">
        <h3 class="text-3xl font-bold text-center text-indigo-200">LOAD GAME</h3>
        <div class="grid w-full grid-cols-4 gap-6 mt-6">
            @foreach ($games as $game)
                <a href="{{ route('game.play', ['game' => $game]) }}" class="flex flex-col items-center gap-4 p-4 bg-black border-2 border-yellow-600 bg-opacity-30">
                    <span class="text-lg font-semibold">
                        {{ $game->player1->name }}
                    </span>
                    <span class="text-2xl font-bold">VS</span>
                    <span class="text-lg font-semibold">
                        {{ $game->player2->name }}
                    </span>
                </a>
            @endforeach
        </div>
    </div>

</div>
