<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Auth;

use App\Fixtures;

class FixtureController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function show() {
        return view('home');
    }

    public function current() {
        $data['fixtures'] = Fixtures::getCurrent();

        return view('current')->with($data);

    }

    public function submitPredictions() {
        $input = Input::all();
        unset($input['_token']);

        $userEmail = Auth::user()->email;

        Fixtures::submitPredictions($input, $userEmail);

        return 'Thanks for submitting your predictions';
    }

    public function previous() {
        $data['fixtures'] = Fixtures::getPrevious(); 

        foreach($data['fixtures'] as $matchday) {
            foreach($matchday as $game) {
                
                if($game->goalsHome > $game->goalsAway) {
                    $game->winner = 'homeTeam';
                } else if($game->goalsHome < $game->goalsAway) {
                    $game->winner = 'awayTeam'; 
                } else {
                    $game->winner = 'draw';
                }
            }
        }

        return view('previous')->with($data);
    }

    public function importDB() {
        Fixtures::initialInsert('/v1/soccerseasons/398/fixtures');
    }
}
