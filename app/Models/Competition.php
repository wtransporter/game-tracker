<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function groups()
    {
        return $this->hasMany(Group::class);
    }

    /**
     * Get all of the group clubs for the competition.
     */
    public function groupMembers()
    {
        return $this->hasManyThrough(
            Team::class,
            Group::class,
            'competition_id',
            'group_id',
            'id',
            'id'
        );
    }

    public function clubs()
    {
        return $this->belongsToMany(Club::class, 'club_competition')->withTimestamps()->where('year', now()->year);
    }

    public function scopeAssigned($query)
    {
        return $query->whereHas('clubs', function($query) {
            $query->whereNotNull('club_id');
        });
    }

    public function games()
    {
        return $this->hasMany(Game::class);
    }
}
