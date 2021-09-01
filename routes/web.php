<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\ClubCompetitionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', [CompetitionController::class, 'index'])->name('home');
    Route::get('competitions/{competition}', [CompetitionController::class, 'show']);
    Route::post('competitions', [CompetitionController::class, 'store'])->name('competitions.store');
    Route::get('competitions/{competition}', [ClubCompetitionController::class, 'index'])->name('competitions.clubs.index');
    Route::get('competitions/{competition}/create', [ClubCompetitionController::class, 'create'])->name('competitions.clubs.create');
    Route::post('competitions/{competition}/store/{club}', [ClubCompetitionController::class, 'store'])->name('competitions.clubs.store');
    Route::get('search', [SearchController::class, 'index'])->name('search');
});
