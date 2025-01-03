<?php

namespace App\Livewire;

use App\Models\Game;
use App\Models\Player;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Session;
use Livewire\Component;

class PlayGameComponent extends Component
{
    public bool $gameFinished = false;

    public String $gameFinishedText = "";

    public int $currentPlayer = 1;

    public Player $playerOne;

    public Player $playerTwo;

    public int $playerOnePoints = 0;

    public int $playerTwoPoints = 0;

    public int $playerOneCellsCount = 0;

    public int $playerTwoCellsCount = 0;

    public array $board;

    public array $projectionBlocks = [];

    public array $selectedBlock = [];


    public function mount()
    {
        $game = Game::find(request()->route('game'));
        $this->playerOne = $game->player1;
        $this->playerTwo = $game->player2;

        if ($game->user_id == Auth::id()) {
            $this->board = json_decode($game->board);
        } else {
            // throw new
        }

        $this->playerOneCellsCount = $this->countPlayerCells(1);
        $this->playerTwoCellsCount = $this->countPlayerCells(2);
        $this->playerOnePoints = $this->countPlayerCells(1) * 10;
        $this->playerTwoPoints = $this->countPlayerCells(2) * 10;
    }

    public function exitGame():void
    {

    }

    public function countPlayerCells(int $player): int
    {
        if($player == 1 || $player == 2) {
            $count = 0;
            foreach($this->board as $row) {
                foreach($row as $column) {
                    if($column == $player) $count++;
                }
            }
            return $count;
        }
    }

    public function createMoveProjection(int $y, int $x, int $player):void
    {
        $this->projectionBlocks = [];
        $this->selectedBlock = [$y, $x];

        for($j = 0; $j < 7; $j++) {
            for($i = 0; $i < 7; $i++) {
                if ($j < $y + 3 && $j > $y - 3 && $i < $x + 3 && $i > $x - 3 && $player == $this->currentPlayer && $this->board[$j][$i] === 0)
                    array_push($this->projectionBlocks, [$j, $i]);
            }
        }
        $this->projectionBlocks = array_filter($this->projectionBlocks, function ($subArray) use ($y, $x) {
            return $subArray !== [$y, $x];
        });
    }

    public function makeMove(int $y, int $x):void
    {
        if (in_array([$y, $x], $this->projectionBlocks, true)) {
            if (abs($this->selectedBlock[0] - $y) < 2 && abs($this->selectedBlock[1] - $x) < 2 ) {
                $this->board[$y][$x] = $this->currentPlayer;
            } else {
                $this->board[$y][$x] = $this->currentPlayer;
                $this->board[$this->selectedBlock[0]][$this->selectedBlock[1]] = 0;
            }
            $this->occupyCell($y, $x);
            $this->endTurn();
        }
    }

    public function occupyCell(int $y, int $x):void
    {
        for($j = 0; $j < 7; $j++) {
            for($i = 0; $i < 7; $i++) {
                if ($j < $y + 2 && $j > $y - 2 && $i < $x + 2 && $i > $x - 2) {
                    if ($this->currentPlayer == 1 && $this->board[$j][$i] == 2) {
                        $this->board[$j][$i] = 1;
                    }

                    if ($this->currentPlayer == 2 && $this->board[$j][$i] == 1) {
                        $this->board[$j][$i] = 2;
                    }
                }
            }
        }
    }

    public function checkMoveAvailability():bool
    {
        if ($this->playerOnePoints == 0) {
            $this->gameFinishedText = "PLAYER 2 IS THE WINNER";
            return true;
        }

        if ($this->playerTwoPoints == 0) {
            $this->gameFinishedText = "PLAYER 1 IS THE WINNER";
            return true;
        }

        $movesLeft = false;

        foreach ($this->board as $row) {
            foreach ($row as $cell) {
                if ($cell === 0) {
                    $movesLeft = true;
                }
            }
        }

        if (!$movesLeft) {
            if ($this->playerOnePoints > $this->playerTwoPoints) {
                $this->gameFinishedText = "PLAYER 1 IS THE WINNER";
            } else if ($this->playerOnePoints < $this->playerTwoPoints) {
                $this->gameFinishedText = "PLAYER 2 IS THE WINNER";
            } else {
                $this->gameFinishedText = "THE GAME ENDED ON TIE";
            }
            return true;
        }


        return false;
    }

    public function endTurn():void
    {
        $this->projectionBlocks = [];
        $this->currentPlayer = $this->currentPlayer === 1 ? 2 : 1;
        $this->playerOneCellsCount = $this->countPlayerCells(1);
        $this->playerTwoCellsCount = $this->countPlayerCells(2);
        $this->playerOnePoints = $this->countPlayerCells(1) * 10;
        $this->playerTwoPoints = $this->countPlayerCells(2) * 10;
        $this->checkMoveAvailability();
    }

    public function render()
    {
        return view('livewire.play-game-component');
    }
}
