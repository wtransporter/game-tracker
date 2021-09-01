<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use Illuminate\Http\Request;

class GroupCompetitionController extends Controller
{
    public function index(Competition $competition)
    {
        return view('competitions.groups.index', [
            'groups' => $competition->groups->load('matches')
        ]);
    }
}
