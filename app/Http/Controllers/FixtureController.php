<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Fixtures;

class FixtureController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function show() {
        return view('home');
    }

    public function previous() {
        $data['fixtures'] = Fixtures::getPrevious(); 

        return view('previous')->with($data);
    }

    public function importDB() {
        //Fixtures::initialInsert('/v1/soccerseasons/398/fixtures');
    }
}
