<?php

namespace App\Livewire;

use App\Models\Game;
use App\Models\Player;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;

class CreateGameComponent extends Component
{
    public String $playerOneName = "";

    public String $playerTwoName = "";

    public Collection $players;

    public Collection $games;

    public ?int $playerOneId = null;

    public ?int $playerTwoId = null;

    public String $playerOneErrorMessage = "";

    public String $playerTwoErrorMessage = "";

    public function mount()
    {
        $this->players = Player::where('user_id', Auth::id())->get();
        $this->games = Game::where('user_id', Auth::id())->where('finished', false)->with('player1', 'player2')->get();
    }

    public function validatePlayerData(?int $id, String $name, int $player):bool
    {
        if (!$id && !$name) {
            if ($player == 1) {
                $this->playerOneErrorMessage = "You must either select a player or create one";
            } else if ($player == 2) {
                $this->playerTwoErrorMessage = "You must either select a player or create one";
            }
            return false;
        }

        if ($id && $name) {
            if ($player == 1) {
                $this->playerOneErrorMessage = "You can either select a player or create one";
            } else if ($player == 2) {
                $this->playerTwoErrorMessage = "You can either select a player or create one";
            }
            return false;
        }

        if (!Player::where('id', $id)) {
            if ($player == 1) {
                $this->playerOneErrorMessage = "This player doesn't exist";
            } else if ($player == 2) {
                $this->playerTwoErrorMessage = "This player doesn't exist";
            }
            return false;
        }

        if ($player == 1) {
            $this->playerOneErrorMessage = "";
        } else if ($player == 2) {
            $this->playerTwoErrorMessage = "";
        }

        return true;
    }

    public function validatePlayersData():bool
    {
        if (!$this->playerOneId && !$this->playerTwoId) {
            return true;
        }

        if ($this->playerOneId == $this->playerTwoId) {
            $this->playerOneErrorMessage = "You cannot select the same player";
            $this->playerTwoErrorMessage = "You cannot select the same player";
            return false;
        }
        return true;
    }

    public function gamePlayerSelection(?int $id = null, ?String $name = null):int
    {
        if ($name && !$id) {
            return Player::create([
                'user_id' => Auth::id(),
                'name' => $this->playerOneName
            ])->id;
        } else if ($id && !$name) {
            return $id;
        }
    }

    public function createGame()
    {
        $playerOneValidated = $this->validatePlayerData($this->playerOneId, $this->playerOneName, 1);
        $playerTwoValidated = $this->validatePlayerData($this->playerTwoId, $this->playerTwoName, 2);
        $mutualValidation = $this->validatePlayersData();

        if ($playerOneValidated && $playerTwoValidated && $mutualValidation) {

            $playerOne = $this->gamePlayerSelection($this->playerOneId, $this->playerOneName);
            $playerTwo = $this->gamePlayerSelection($this->playerTwoId, $this->playerTwoName);

            $board = json_encode([
                [1, 0, 0, 0, 0, 0, 2],
                [0, 0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0, 0],
                [2, 0, 0, 0, 0, 0, 1],
            ]);

            $game = Game::create([
                'user_id' => Auth::id(),
                'player1_id' => $playerOne,
                'player2_id' => $playerTwo,
                'board' => $board
            ]);

            return redirect()->route('game.play', ['game' => $game]);
        }
    }

    public function render()
    {
        return view('livewire.create-game-component');
    }
}
