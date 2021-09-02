<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Competition;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\GameUpdateRequest;

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

    public function update(Game $game, GameUpdateRequest $request)
    {
        $game->load(['homeClub', 'awayClub']);

        if ($request->has('hscore')) {
            $game->increment('hscore');
            $game->homeClub->team()->increment('scored');
            $game->awayClub->team()->increment('conceded');
        }

        if ($request->has('ascore')) {
            $game->increment('ascore');
            $game->homeClub->team()->increment('conceded');
            $game->awayClub->team()->increment('scored');
        }

        return redirect()->route('competitions.timetable.index', $game->competition_id);
    }

    public function finish(Game $game)
    {
        $game->load(['homeClub', 'awayClub']);

        $game->update(['status' => 1]);

        if ($game->hscore > $game->ascore) {
            $game->homeClub->team()->update(['win' => DB::raw('win+1'), 'points' => DB::raw('points+3')]);
            $game->awayClub->team()->update(['lost' => DB::raw('lost+1')]);
        } else if ($game->hscore < $game->ascore) {
            $game->homeClub->team()->update(['lost' => DB::raw('lost+1')]);
            $game->awayClub->team()->update(['win' => DB::raw('win+1'), 'points' => DB::raw('points+3')]);
        } else {
            $game->homeClub->team()->update(['draw' => DB::raw('draw+1'), 'points' => DB::raw('points+1')]);
            $game->awayClub->team()->update(['draw' => DB::raw('draw+1'), 'points' => DB::raw('points+1')]);
        }

        return redirect()->route('competitions.timetable.index', $game->competition_id);
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