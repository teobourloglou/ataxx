<?php

namespace App\Livewire;

use Livewire\Attributes\Session;
use Livewire\Component;

class GameComponent extends Component
{

    #[Session]
    public bool $gameStarted = false;

    #[Session]
    public int $currentPlayer = 1;

    #[Session]
    public String $playerOneName = "";

    #[Session]
    public String $playerTwoName = "";

    #[Session]
    public int $playerOnePoints = 0;

    #[Session]
    public int $playerTwoPoints = 0;

    #[Session]
    public int $playerOneCellsCount = 0;

    #[Session]
    public int $playerTwoCellsCount = 0;

    #[Session]
    public array $board;

    public function startGame():void
    {
        $this->board = [
            [1, 0, 0, 0, 0, 0, 2],
            [0, 0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 0],
            [0, 0, 0, 1, 0, 0, 0],
            [2, 0, 0, 0, 0, 0, 1],
        ];

        $this->gameStarted = true;
        $this->playerOneCellsCount = $this->countPlayerCells(1);
        $this->playerTwoCellsCount = $this->countPlayerCells(2);
    }

    public function exitGame():void
    {
        $this->gameStarted = false;
        $this->currentPlayer = 1;
        $this->playerOneName = "";
        $this->playerTwoName = "";
        $this->playerOnePoints = 0;
        $this->playerTwoPoints = 0;
        $this->playerOneCellsCount = 0;
        $this->playerTwoCellsCount = 0;
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


    public function render()
    {
        return view('livewire.game-component');
    }
}
