<div class="text-white">
    <h1 class="text-4xl font-bold text-center">SCOREBOARD</h1>
    <div class="grid grid-cols-6 col-span-1">
        <h3 class="my-4 text-2xl text-center underline col-span-full">GLOBAL TOP 10</h3>
        <span class="text-left underline">NAME</span>
        <span class="text-center underline">TOTAL GAMES</span>
        <span class="text-center underline">WINS</span>
        <span class="text-center underline">LOSSES</span>
        <span class="text-center underline">WIN RATE</span>
        <span class="text-right underline">HIGHSCORE</span>
        @foreach ($allPlayers as $player)
            <span class="text-lg text-left whitespace-nowrap">{{ $player->name }}</span>
            <span class="text-lg text-center">{{ $player->total_games }}</span>
            <span class="text-lg text-center">{{ $player->wins }}</span>
            <span class="text-lg text-center">{{ $player->losses }}</span>
            @if($player->losses > 0)
                <span class="text-lg text-center">{{ round($player->wins / $player->losses, 2) }}</span>
            @else
                <span class="text-lg text-center">0</span>
            @endif
            <span class="text-lg text-right">{{ $player->highscore }}</span>
        @endforeach
        <h3 class="my-4 text-2xl text-center underline col-span-full">USER TOP 10</h3>
        <span class="text-left underline">NAME</span>
        <span class="text-center underline">TOTAL GAMES</span>
        <span class="text-center underline">WINS</span>
        <span class="text-center underline">LOSSES</span>
        <span class="text-center underline">WIN RATE</span>
        <span class="text-right underline">HIGHSCORE</span>
        @foreach ($userPlayers as $player)
            <span class="text-lg text-left whitespace-nowrap">{{ $player->name }}</span>
            <span class="text-lg text-center">{{ $player->total_games }}</span>
            <span class="text-lg text-center">{{ $player->wins }}</span>
            <span class="text-lg text-center">{{ $player->losses }}</span>
            @if($player->losses > 0)
                <span class="text-lg text-center">{{ round($player->wins / $player->losses, 2) }}</span>
            @else
                <span class="text-lg text-center">0</span>
            @endif
            <span class="text-lg text-right">{{ $player->highscore }}</span>
        @endforeach
    </div>
</div>
