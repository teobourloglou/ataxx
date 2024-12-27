<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Player extends Model
{
    /** @use HasFactory<\Database\Factories\PlayerFactory> */
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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**************
     *  HasMany  *
     **************/

    public function games(): HasMany
    {
        return $this->hasMany(Game::class);
    }
}
