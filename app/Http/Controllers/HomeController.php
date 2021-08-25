<?php

namespace App\Http\Controllers;

use App\Models\Club;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', [
            'clubs' => Club::paginate(40)
        ]);
    }
}
