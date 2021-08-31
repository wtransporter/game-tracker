<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function groups()
    {
        return $this->belongsToMany(Group::class)
            ->withPivot('scored', 'conceded', 'win', 'draw', 'lost', 'points');
    }

    public function competition()
    {
        return $this->belongsToMany(Competition::class, 'club_competition');
    }
}
