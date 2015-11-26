<?php

$uri = 'http://api.football-data.org/v1/soccerseasons/398/fixtures';
$reqPrefs['http']['method'] = 'GET';
$reqPrefs['http']['header'] = 'X-Auth-Token: TOKEN_HERE';
$stream_context = stream_context_create($reqPrefs);
$response = file_get_contents($uri, false, $stream_context);
$table = json_decode($response);

foreach($table->fixtures as $fixture) {
    if($fixture->status != "FINISHED") {
        echo "<pre>";
        var_dump($fixture);
    }
}
