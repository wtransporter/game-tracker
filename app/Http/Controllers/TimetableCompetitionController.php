<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Competition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Services\StandingService;
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
        if ($this->hasGames($competition->id) || !$this->groupsAreFull($competition)) {
            return redirect()->route('home')->withErrors('Games already generated or groups are not full');
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
                            'date' => now()
                        ]);
                    }
                }
            } ;
        };

        return redirect()->route('home')->with('success', 'Competition timetable generated.');
    }

    protected function hasGames(int $id): bool
    {
        return Game::where('competition_id', '=', $id)->get()->count() > 0;
    }

    protected function groupsAreFull($competition)
    {
        $ids = $competition->groups()->pluck('id');

        $result = DB::table('club_group')
             ->select(DB::raw('count(*) as club_count'))
             ->whereIn('group_id', $ids)
             ->whereNull('club_id')
             ->get();

        if ($result->first()->club_count > 0) {
            return false;
        }

        return true;
    }
}
