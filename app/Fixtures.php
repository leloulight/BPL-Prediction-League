<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fixtures extends Model
{
    private static $token,
                   $uri = "http://api.football-data.org/";

    public function __construct() {
        self::$token = env('FIXTURE_API_TOKEN', '');
    }

    public static function get($url) {
        $url = self::$uri . $url;

        $reqPrefs['http']['method'] = 'GET';
        $reqPrefs['http']['header'] = 'X-Auth-Token: ' . self::$token . '';

        $stream_context = stream_context_create($reqPrefs);
        $response = file_get_contents($url, false, $stream_context);

        $data = json_decode($response);

        return $data;
    }
}
