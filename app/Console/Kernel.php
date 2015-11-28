<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use DB;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function(){
            $mID = DB::table('weekPredictions')->pluck('matchdayID');
            $finishedFixtures = DB::table('fixtures')->where('status', 'FINISHED')->take(10)->orderBy('matchdayID', 'desc')->get();
            $usersPredictions = DB::table('weekPredictions')->get();

            foreach($usersPredictions as $prediction) {
                if($mID != $prediction->matchdayID) {
                    continue;
                } 
            }

            foreach($finishedFixtures as $fixture) {
            
                if($fixture->matchdayID == $mID) {
                
                    $userPredCount = 0;
                    foreach($usersPredictions as $prediction) {
                        if($fixture->homeTeam == $prediction->$userPredCount) {

                            //User said home team
                            //Did the home team win?
                            if($fixture->goalsHome > $fixture->goalsAway) {
                                //User Predicted correctly.
                                //Give them 3 points
                                DB::table('userTable')
                                    ->where('username', $prediction->userEmail)
                                    ->increment('points', 3);
                            }
                        } else if($fixture->awayTeam == $prediction->$userPredCount) {
                            //User said away team
                            if($fixture->goalsHome < $fixture->goalsAway) {
                                //User was correct
                                //Give them 3 points
                                DB::table('userTable')
                                    ->where('username', $prediction->userEmail)
                                    ->increment('points', 3);
                            
                            } 
                        } else if($prediction->$userPredCount == 'draw') {
                            //User Predicted a draw

                            if($fixture->goalsHome == $fixture->goalsAway) {
                                //User was correct
                                //Give them 3 points
                                DB::table('userTable')
                                    ->where('username', $prediction->userEmail)
                                    ->increment('points', 1);
                            }
                        }

                        DB::table('weekPredictions')
                            ->where('userEmail', $prediction->userEmail)
                            ->increment('matchdayID', 1)
                            ->update(array(
                                '0' => NULL,
                                '1' => NULL,
                                '2' => NULL,
                                '3' => NULL,
                                '4' => NULL,
                                '5' => NULL,
                                '6' => NULL,
                                '7' => NULL,
                                '8' => NULL,
                                '9' => NULL,
                            ));
                        $userPredCount++;
                    }
                }
            }
        })->everyMinute();
    }
}
