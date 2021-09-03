<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClubUpdateRequest;
use App\Models\Club;

class ClubController extends Controller
{
    public function index()
    {
        return view('clubs.index', [
            'clubs' => Club::paginate(40)
        ]);
    }

    public function edit(Club $club)
    {
        return view('clubs.edit', compact('club'));
    }

    public function update(Club $club, ClubUpdateRequest $request)
    {
        $attributes = $request->validated();

        if ($request->has('logo')) {
            $fileName = $request->file('logo')->getClientOriginalName();
            $request->file('logo')->storeAs('logos', $fileName);

            unset($attributes['logo']);
            $attributes = array_merge(['logo' => $fileName], $attributes);
        }

        $club->update($attributes);

        return redirect()->route('clubs.edit', $club->id);
    }
}
