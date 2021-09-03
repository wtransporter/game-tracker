<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function scopeAssigned($query)
    {
        return $query->whereHas('competition', function($query) {
            $query->where('year', '=', now()->year);
        });
    }

    public function scopeAvailable($query)
    {
        return $query->whereNotIn('id', $this->assigned()->get()->pluck('id'));
    }

    public function team()
    {
        return Team::where('club_id', '=', $this->id)->first();
    }

    public function logoPath()
    {
        return $this->logo 
                ? asset('storage/logos/' . $this->logo)
                : asset('/img/uefa.png');
    }
}
