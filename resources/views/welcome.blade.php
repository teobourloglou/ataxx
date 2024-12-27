<x-guest-layout>
    <div class="flex flex-col items-center justify-center gap-8">
        @auth
            <a href="{{ route('game') }}" class="text-xl text-white">PLAY</a>
        @else
            <a href="{{ route('login') }}" class="text-xl text-white">LOG IN</a>
            <a href="{{ route('register') }}" class="text-xl text-white">REGISTER</a>
        @endauth
    </div>
</x-guest-layout>