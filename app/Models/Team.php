<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Team extends Pivot
{
    use HasFactory;

    public $table = 'club_group';
}
