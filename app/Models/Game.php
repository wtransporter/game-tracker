<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function homeClub()
    {
        return $this->belongsTo(Club::class, 'home_id', 'id');
    }

    public function awayClub()
    {
        return $this->belongsTo(Club::class, 'away_id', 'id');
    }
}
