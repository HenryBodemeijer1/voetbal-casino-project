<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prediction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'poule_id',
        'event_key',
        'home_team_key',
        'away_team_key',
        'event_home_team',
        'event_away_team',
        'event_final_result',
        'winning_team', 
        'eindstand', 
        'points',
        'ActualWinner',
    ];

    // public function game()
    // {
    //     return $this->belongsTo(Game::class);
    // }

    public function poules()
    {
        return $this->belongsToMany(Poule::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}