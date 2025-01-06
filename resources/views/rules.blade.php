<x-app-layout background="bg-gradient-to-b from-gray-900 to-gray-600 bg-gradient-to-r">
    <div class="pt-6">
        <div class="pb-32 mx-auto mt-48 max-w-7xl sm:px-6 lg:px-8">
            <x-rules.section>
                <x-rules.heading text="Overview" />
                <p class="text-lg text-gray-100"><b>Ataxx</b> is a two-player board game which fist appeared in 1990 as an arcade video game by The Leland Corporation. The game was invented by Dave Crummack and Craig Galley in 1988.</p>
            </x-rules.section>

            <x-rules.section>
                <x-rules.heading text="Board" />
                <p class="text-lg text-gray-100"><i>Ataxx</i> is played on a 7x7 board.<br>There are two players: <i>Red</i> and <i>Blue</i>.<br>The initial position of the checkers is shown in the following picture:</p>
                <img class="w-1/3" src="{{ asset('/images/rules.png') }}" />
            </x-rules.section>

            <x-rules.section>
                <x-rules.heading text="Objective" />
                <p class="text-lg text-gray-100">The goal of <i>Ataxx</i> is to occupy more board cells with your own <i>checkers</i> than your opponent when the boead is completely filled.</p>
            </x-rules.section>

            <x-rules.section>
                <x-rules.heading text="Play" />
                <p class="text-lg text-gray-100">Players move alternaly, starting from the player controlling the <i>red checkers</i>.<br>A <i>checker</i> can move to any empty cell that is no more than two cells horizontally and vertically away from its source location:<br><br>- If a <i>checker</i> slides to an adjacent cell then the <i>checker</i> is split into two pieces, i.e. the chosen chekers stays at its source location and another <i>checker</i> of the same color is placed on the destination cell:</p>
                <div class="flex justify-start gap-3">
                    <img class="w-1/3" src="{{ asset('/images/rules2.png') }}" />
                    <img class="w-1/3" src="{{ asset('/images/rules3.png') }}" />
                </div>

                <p class="text-lg text-gray-100">- If a checker jumps then it's removed from the source location and moved to the destination cell:</p>
                <div class="flex justify-start gap-3">
                    <img class="w-1/3" src="{{ asset('/images/rules4.png') }}" />
                    <img class="w-1/3" src="{{ asset('/images/rules5.png') }}" />
                </div>
                <p class="text-lg text-gray-100">After the move, all opponent's checkers adjacent to the destination cell are replaced with the player's ones</p>
            </x-rules.section>
        </div>
    </div>
</x-app-layout>
