<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Competition;
use Illuminate\Http\Request;
use App\Http\Requests\GameUpdateRequest;
use App\Http\Services\StandingService;

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

    public function edit(Game $game)
    {
        return view('competitions.games.edit', [
            'game' => $game
        ]);
    }

    public function updateDate(Game $game, Request $request)
    {
        $game->update(['date' => $request->get('date'), 'time' => $request->get('time')]);

        return redirect()->route('competitions.timetable.edit', $game)->with(['success' => 'Date and time updated successfully.']);
    }

    public function update(Game $game, GameUpdateRequest $request, StandingService $standing)
    {
        $standing->calculate($game, $request);

        return redirect()->route('competitions.timetable.index', $game->competition_id);
    }

    public function finish(Game $game)
    {
        $game->update(['status' => 1]);

        return redirect()->route('competitions.timetable.index', $game->competition_id);
    }

    public function start(Game $game, StandingService $standing)
    {
        $game->update(['status' => 0]);

        $standing->startingPoints($game);

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
