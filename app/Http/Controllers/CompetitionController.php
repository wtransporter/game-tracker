<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    public function index()
    {
        return view('home', [
            'competitions' => Competition::all()
        ]);
    }

    public function show(Competition $competition)
    {
        return $competition->load(['groups', 'groups.clubs']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'size' => ['required', 'numeric'],
            'group_size' => ['required', 'numeric']
        ]);

        $competition = Competition::create($request->only(['name', 'size']));

        // for ($x = 1; $x <= $competition->size; $x++) {
        //     $competition->groups()->create([
        //         'name' => 'Group ' . $x,
        //         'size' => $request->get('group_size')
        //     ]);
        // }

        // foreach ($competition->groups as $group) {
        //     for ($i = 0; $i < $group->size; $i++) { 
        //         $group->clubs()->attach([
        //             'club->id' => null
        //         ]);
        //     }
        // }

        return response($competition, 201);
    }
}
