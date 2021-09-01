<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
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
        $ids = $this->assigned()->get();

        return $query->whereNotIn('id', $ids->pluck('id'));
    }
}
