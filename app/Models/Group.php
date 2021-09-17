<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
            ->withPivot('id', 'scored', 'conceded', 'win', 'draw', 'lost', 'points')
            ->orderByPivot('points', 'desc')
            ->orderByRaw(DB::raw('`club_group`.`scored` - `club_group`.`conceded` desc'));
    }

    public function matches()
    {
        return $this->belongsToMany(Group::class, 'club_group')->with('clubs')
            ->withPivot(['club_id', 'id'])
            ->orderBy('points', 'desc')
            ->orderByRaw(DB::raw('`club_group`.`scored` - `club_group`.`conceded` desc'));;
    }
}
