<div class="relative text-white min-h-[70vh] gap-4 grid grid-cols-12 overflow-hidden sm:rounded-lg p-4">

    <div class="flex flex-col items-center justify-start col-span-6 gap-6 py-16">
        <h2 class="text-4xl font-bold text-white">PLAYER 1</h2>

        <h3>SELECT A PLAYER</h3>

        <select wire:model='playerOneId' class="w-1/2 bg-transparent border-2 border-yellow-600 focus:border-yellow-800 focus:ring-yellow-600 bg-opacity-30 placeholder:text-white">
            <option value="">SELECT A PLAYER</option>
            @foreach($players as $player)
                <option value="{{ $player->id }}" wire:key="player-1-{{ $player->id }}">{{ $player->name }}</option>
            @endforeach
        </select>

        <h3>OR CREATE A NEW ONE</h3>

        <input wire:model='playerOneName' placeholder="ENTER YOUR NAME" type="text" class="w-1/2 text-lg text-white bg-black border-2 border-yellow-600 focus:border-yellow-800 focus:ring-yellow-600 bg-opacity-30 placeholder:text-white">

        <div class="font-semibold text-red-400">{{ $playerOneErrorMessage }}</div>
    </div>
    <div class="absolute flex flex-col items-center justify-center w-full top-3/4">
        <button wire:click='createGame()' class="text-3xl text-white drop-shadow-xl animate-pulse">PRESS HERE TO START GAME</button>
    </div>
    <div class="flex flex-col items-center justify-start col-span-6 gap-6 py-16">
        <h2 class="text-4xl font-bold text-white">PLAYER 2</h2>

        <h3>SELECT A PLAYER</h3>

        <select wire:model='playerTwoId' class="w-1/2 bg-transparent border-2 border-yellow-600 focus:border-yellow-800 focus:ring-yellow-600 bg-opacity-30 placeholder:text-white">
            <option value="">SELECT A PLAYER</option>
            @foreach($players as $player)
                <option value="{{ $player->id }}" wire:key="player-2-{{ $player->id }}">{{ $player->name }}</option>
            @endforeach
        </select>

        <h3>OR CREATE A NEW ONE</h3>

        <input wire:model='playerTwoName' placeholder="ENTER YOUR NAME" type="text" class="w-1/2 text-lg text-white bg-black border-2 border-yellow-600 focus:border-yellow-800 focus:ring-yellow-600 bg-opacity-30 placeholder:text-white">

        <div class="font-semibold text-red-400">{{ $playerTwoErrorMessage }}</div>
    </div>

</div>
