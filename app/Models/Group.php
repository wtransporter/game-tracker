<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public $timestamps = false;

    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }

    public function clubs()
    {
        return $this->belongsToMany(Club::class)
            ->withTimestamps()
            ->withPivot('scored', 'conceded', 'win', 'draw', 'lost', 'points');
    }

    public function matches()
    {
        return $this->belongsToMany(Group::class, 'club_group')->with('clubs')->withPivot('club_id');
    }
}
