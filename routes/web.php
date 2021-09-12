<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\ClubCompetitionController;
use App\Http\Controllers\GroupCompetitionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TimetableCompetitionController;

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

Route::get('/', [HomeController::class, 'index'])->name('user.home');

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard', [CompetitionController::class, 'index'])->name('home');
    Route::get('competitions/{competition}', [CompetitionController::class, 'show'])->name('competitions.show');
    Route::post('competitions', [CompetitionController::class, 'store'])->name('competitions.store');
    Route::get('competitions/{competition}/clubs', [ClubCompetitionController::class, 'index'])->name('competitions.clubs.index');
    Route::get('competitions/{competition}/create', [ClubCompetitionController::class, 'create'])->name('competitions.clubs.create');
    Route::post('competitions/{competition}/store/{club}', [ClubCompetitionController::class, 'store'])->name('competitions.clubs.store');

    Route::get('groups/{competition}', [GroupCompetitionController::class, 'index'])->name('groups.competitions.index');
    Route::post('competition/{competition}/groups/{groupId}', [GroupCompetitionController::class, 'store'])->name('groups.competitions.store');

    Route::get('competition/{competition}/timetable', [TimetableCompetitionController::class, 'index'])->name('competitions.timetable.index');
    Route::get('competition/timetable/{game}/edit', [TimetableCompetitionController::class, 'edit'])->name('competitions.timetable.edit');
    Route::post('competition/{competition}/timetable', [TimetableCompetitionController::class, 'store'])->name('competitions.timetable.store');
    Route::patch('competition/timetable/{game}/update', [TimetableCompetitionController::class, 'update'])->name('competitions.timetable.update');
    Route::patch('competition/timetable/{game}/updateDate', [TimetableCompetitionController::class, 'updateDate'])->name('competitions.timetable.updateDate');
    Route::post('competition/timetable/{game}/finish', [TimetableCompetitionController::class, 'finish'])->name('competitions.timetable.finish');
    Route::post('competition/timetable/{game}/start', [TimetableCompetitionController::class, 'start'])->name('competitions.timetable.start');

    Route::get('search', [SearchController::class, 'index'])->name('search');

    Route::get('clubs', [ClubController::class, 'index'])->name('clubs.index');
    Route::get('clubs/{club}/edit', [ClubController::class, 'edit'])->name('clubs.edit');
    Route::patch('clubs/{club}/update', [ClubController::class, 'update'])->name('clubs.update');
});
