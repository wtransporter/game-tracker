<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Competition;

class ClubCompetitionController extends Controller
{
    public function create(Competition $competition)
    {
        return view('competitions.clubs.index', [
            'clubs' => Club::paginate(40),
            'competition' => $competition->load('clubs')
        ]);
    }

    public function store(Competition $competition, Club $club)
    {
        if ($competition->clubs->contains($club)) {
            $competition->clubs()->detach($club->id);
        } else {
            $competition->clubs()->attach([$club->id =>['year' => now()->year]]);
        }

        return response(['message' => 'Success'], 201);
    }
}
