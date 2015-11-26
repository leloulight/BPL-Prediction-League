<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Fixtures;

class FixtureController extends Controller
{
    public function show() {
        $data['fixtures'] = Fixtures::get('v1/soccerseasons/398/fixtures');
        return view('home')->with($data);
    }
}
