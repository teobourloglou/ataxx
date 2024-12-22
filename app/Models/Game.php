<?php

namespace App\Models;

use App\GameType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Game extends Model
{
    /** @use HasFactory<\Database\Factories\GameFactory> */
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'game_type' => GameType::class
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    |
    */

    /**************
     *  BelongsTo  *
     **************/

    public function player1():BelongsTo
    {
        return $this->belongsTo(User::class, 'player1_id');
    }

    public function player2():BelongsTo
    {
        return $this->belongsTo(User::class, 'player2_id');
    }

    public function winner():BelongsTo
    {
        return $this->belongsTo(User::class, 'winner_id');
    }
}
