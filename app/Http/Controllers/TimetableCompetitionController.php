<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Competition;

class TimetableCompetitionController extends Controller
{
    public function index(Competition $competition)
    {
        $grouped = $competition->games()->get()->groupBy(function($query) {
            return $query->date->format('D, M j');
        });

        return view('competitions.games.index', [
            'allGames' => $grouped
        ]);
    }

    public function store(Competition $competition)
    {
        if ($this->hasGames($competition->id)) {
            return redirect()->route('home')->withErrors('Games already generated');
        }

        foreach ($competition->groups as $group) {
            foreach ($group->clubs as $home) {
                foreach ($group->clubs as $away) {
                    if ($home != $away) {
                        Game::create([
                            'competition_id' => $competition->id,
                            'group_id' => $group->id,
                            'home_id' => $home->id,
                            'away_id' => $away->id,
                        ]);
                    }
                }
            } ;
        };

        return redirect()->route('home');
    }

    protected function hasGames(int $id): bool
    {
        return Game::where('competition_id', '=', $id)->get()->count() > 0;
    }
}
