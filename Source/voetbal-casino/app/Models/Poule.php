<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poule extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
    ];
    

    // Relationship with users 
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    // Relationship with predictions
    public function predictions()
    {
        return $this->hasMany(Prediction::class);
    }
}