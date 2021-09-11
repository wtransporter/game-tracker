<?php

namespace App\Http\Services;

use App\Models\Competition;
use Illuminate\Http\Request;

class GenerateGroups
{
    protected $groupNames = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K'];

    public function generate(Competition $competition, Request $request)
    {
        for ($x = 1; $x <= $competition->size; $x++) {
            $competition->groups()->create([
                'name' => 'Group ' . $this->groupNames[$x-1],
                'size' => $request->get('group_size')
            ]);
        }

        foreach ($competition->groups as $group) {
            for ($i = 0; $i < $group->size; $i++) { 
                $group->clubs()->attach([
                    'club->id' => null
                ]);
            }
        }
    }
}