<?php

namespace App\Models;

use App\GameType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Game extends Model
{
    /** @use HasFactory<\Database\Factories\GameFactory> */
    use HasFactory;

    protected $guarded = [];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    |
    */

    /**************
     *  BelongsTo  *
     **************/

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**************
     *  HasMany  *
     **************/

    public function players():HasMany
    {
    return $this->hasMany(Player::class);
    }
}
