<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = ['summoner_id', 'game_id', 'win', 'kills', 'deaths', 'assists'];

    public function summoner()
    {
        return $this->belongsTo(Summoner::class);
    }
}
