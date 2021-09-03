<?php

namespace App\Http\Services;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StandingService
{
    public function calculate(Game $game, Request $request)
    {
        if ($request->has('hscore')) {
            $game->homeClub->team()->increment('scored');
            $game->awayClub->team()->increment('conceded');

            if ($game->hscore > $game->ascore) {
                $game->increment('hscore');
            } else if ($game->hscore < $game->ascore) {
                $game->increment('hscore');
                if ($game->hscore == $game->ascore) {
                    $game->homeClub->team()->update(['lost' => DB::raw('lost-1'), 'draw' => DB::raw('draw+1'), 'points' => DB::raw('points+1')]);
                    $game->awayClub->team()->update(['win' => DB::raw('win-1'), 'draw' => DB::raw('draw+1'), 'points' => DB::raw('points-2')]);
                }
            } else {
                $game->increment('hscore');
                $game->homeClub->team()->update(['win' => DB::raw('win+1'), 'draw' => DB::raw('draw-1'), 'points' => DB::raw('points+2')]);
                $game->awayClub->team()->update(['lost' => DB::raw('lost+1'), 'draw' => DB::raw('draw-1'), 'points' => DB::raw('points-1')]);
            }
        }

        if ($request->has('ascore')) {
            $game->homeClub->team()->increment('conceded');
            $game->awayClub->team()->increment('scored');

            if ($game->hscore < $game->ascore) {
                $game->increment('ascore');
            } else if ($game->hscore > $game->ascore) {
                $game->increment('ascore');
                if ($game->hscore == $game->ascore) {
                    $game->homeClub->team()->update(['win' => DB::raw('win-1'), 'draw' => DB::raw('draw+1'), 'points' => DB::raw('points-2')]);
                    $game->awayClub->team()->update(['lost' => DB::raw('lost-1'), 'draw' => DB::raw('draw+1'), 'points' => DB::raw('points+1')]);
                }
            } else {
                $game->increment('ascore');
                $game->homeClub->team()->update(['lost' => DB::raw('lost+1'), 'draw' => DB::raw('draw-1'), 'points' => DB::raw('points-1')]);
                $game->awayClub->team()->update(['win' => DB::raw('win+1'), 'draw' => DB::raw('draw-1'), 'points' => DB::raw('points+2')]);
            }
        }
    }

    public function startingPoints(Game $game)
    {
        $game->homeClub->team()->update(['draw' => DB::raw('draw+1'), 'points' => DB::raw('points+1')]);
        $game->awayClub->team()->update(['draw' => DB::raw('draw+1'), 'points' => DB::raw('points+1')]);
    }
}