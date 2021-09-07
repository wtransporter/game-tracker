<?php

namespace App\Http\Controllers;

use App\Models\Competition;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $competition = Competition::latest()->first();
        $grouped = $competition->games()->get()->groupBy(function($query) {
            return $query->date->format('D, M j');
        });

        return view('home', [
            'allGames' => $grouped
        ]);
    }
}
