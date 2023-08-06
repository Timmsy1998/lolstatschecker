<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Summoner extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'server', 'level', 'rank'];

    public function games()
    {
        return $this->hasMany(Game::class);
    }
}
