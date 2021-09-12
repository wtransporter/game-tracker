<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompetitionStoreRequest;
use App\Http\Services\GenerateGroups;
use App\Models\Competition;

class CompetitionController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'competitions' => Competition::all()
        ]);
    }

    public function show(Competition $competition)
    {
        $ids = $competition->groupMembers->whereNotNull('club_id')->pluck('club_id');;
        $clubs = $competition->clubs->whereNotIn('id', $ids);
        $selectedClubs = $competition->clubs->whereIn('id', $ids);

        return view('competitions.show', [
            'competition' => $competition,
            'groups' => $competition->groups->load('matches'),
            'clubs' => $clubs,
            'selectedClubs' => $selectedClubs
        ]);
    }

    public function store(CompetitionStoreRequest $request, GenerateGroups $service)
    {
        $competition = Competition::create($request->except('group_size'));

        $service->generate($competition, $request);

        if ($request->wantsJson()) {
            return response($competition, 201);
        }

        // return redirect()->route('home');
    }
}
