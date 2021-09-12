<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use Illuminate\Http\Request;

class GroupCompetitionController extends Controller
{
    public function index(Competition $competition)
    {
        $ids = $competition->groupMembers->whereNotNull('club_id')->pluck('club_id');;
        $clubs = $competition->clubs->whereNotIn('id', $ids);
        $selectedClubs = $competition->clubs->whereIn('id', $ids);

        return view('competitions.groups.index', [
            'groups' => $competition->groups->load('matches'),
            'clubs' => $clubs,
            'selectedClubs' => $selectedClubs
        ]);
    }

    public function store(Competition $competition, $groupId, Request $request)
    {
        $members = $competition->groupMembers->where('group_id', '=', $groupId)->where('id', '=', $request->get('rbr'));
        $member = $members->first();

        $member->update(['club_id' => $request->get('club_id')]);

        return redirect()->route('competitions.show', $competition)->with(['success' => 'Club added']);

    }
}
