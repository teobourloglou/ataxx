<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('player1_id');
            $table->unsignedBigInteger('player2_id')->nullable();
            $table->json('board');
            $table->unsignedBigInteger('winner_id')->nullable();
            $table->enum('game_type', ['local', 'online']);
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('player1_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('player2_id')->references('id')->on('users')->nullOnDelete();
            $table->foreign('winner_id')->references('id')->on('users')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
