<?php

namespace App\Livewire;

use App\Models\Player;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ScoreboardComponent extends Component
{
    public bool $filteredByUser = true;

    public Collection $allPlayers;

    public Collection $userPlayers;

    public function mount()
    {
        $this->allPlayers = $this->getPlayers(false);
        $this->userPlayers = $this->getPlayers(true);
    }

    public function getPlayers(bool $filterOnlyUserPlayers):Collection
    {
        if ($filterOnlyUserPlayers)
            return Player::where('user_id', Auth::id())->orderBy('wins', 'desc')->take(10)->get();

        return Player::orderBy('wins', 'desc')->take(10)->get();
    }

    public function render()
    {
        return view('livewire.scoreboard-component');
    }
}
