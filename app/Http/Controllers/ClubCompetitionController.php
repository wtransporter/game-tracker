<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Competition;
use Illuminate\Http\Request;

class ClubCompetitionController extends Controller
{
    public function index(Competition $competition)
    {
        return view('competitions.clubs.index', [
            'clubs' => $competition->clubs()->paginate(40),
            'competition' => $competition
        ]);
    }
    
    public function create(Competition $competition, Request $request)
    {
        $attributes = $request->validate([
            'search' => ['sometimes', 'alpha_num', 'nullable']
        ]);

        $clubs = Club::available();

        if ($request->has('search')) {
            $clubs->where('name', 'like', '%' . $attributes['search'] . '%');
        }

        return view('competitions.clubs.index', [
            'clubs' => $clubs->paginate(40),
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
