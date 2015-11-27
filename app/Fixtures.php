<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Fixtures extends Model
{
    private static $token,
                   $uri = "http://api.football-data.org/";

    public function __construct() {
        self::$token = env('FIXTURE_API_TOKEN', '');
    }
    
    public static function getCurrent() {
        $matchday = DB::table('fixtures')->where('status', 'TIMED')->take(10)->get();
        
        return $matchday;
    }

    public static function submitPredictions($predictions, $userEmail) {

        $gameColumn = 0;
        foreach($predictions as $key => $value) {
            DB::table('weekPredictions')
                ->where('userEmail', $userEmail)
                ->update(array($gameColumn => $value));
            $gameColumn++; 
        }
    }

    public static function getPrevious() {

        $fixtures = array();
        for($i = 38; $i >= 0; $i--) {
            $matchday =  DB::table('fixtures')->where('status', 'FINISHED')->where('matchdayID', $i)->get();

            if(!empty($matchday)) {
                $fixtures[] = $matchday;
            }
        }

        return $fixtures;
    }

    public static function initialInsert($url) {
        $url = self::$uri . $url;
        $reqPrefs['http']['method'] = 'GET';
        $reqPrefs['http']['header'] = 'X-Auth-Token: ' . self::$token . '';

        $stream_context = stream_context_create($reqPrefs);

        $response = file_get_contents($url, false, $stream_context);
        $fixtures = json_decode($response);

        foreach($fixtures->fixtures as $fixture) {
            DB::table('fixtures')->insertGetId(array(
                'matchdayID' => $fixture->matchday,
                'homeTeam' => $fixture->homeTeamName,
                'awayTeam' => $fixture->awayTeamName,
                'status' => $fixture->status,
                'fixtureTime' => $fixture->date,
                'goalsHome' => $fixture->result->goalsHomeTeam,
                'goalsAway' => $fixture->result->goalsAwayTeam
            ));
        }
    }
}
