<?php

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
        Schema::create('predictions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('poule_id')->constrained();
            $table->integer('event_key')->nullable();
            $table->integer('home_team_key');
            $table->integer('away_team_key');
            $table->string('event_home_team');
            $table->string('event_away_team');
            $table->string('event_final_result')->nullable();
            $table->string('winning_team'); 
            $table->string('actualWinner')->nullable();
            $table->string('eindstand'); 
            $table->string('points')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('predictions');
    }
};
