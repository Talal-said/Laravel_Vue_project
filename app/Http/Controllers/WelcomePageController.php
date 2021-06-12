<?php

namespace App\Http\Controllers;

use App\Models\Match;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomePageController extends Controller
{
    public function getData(){
        $time_now = time()*1000; // the time in microSeconds

        $date_now = date("d-m-Y"); // OR m/d/Y
        $today_date_timestamp = strtotime("-3 hours", strtotime($date_now ." 12:00:00AM")) * 1000;


        $smallest_date = DB::select(DB::raw("SELECT MIN(match_date) AS Date FROM `matches`
                        WHERE `match_date` >= $today_date_timestamp"));

        $smallest_date_value = $smallest_date[0]->Date;


        if(isset($smallest_date_value) && $smallest_date_value == $today_date_timestamp){

            $smallest_time = DB::select(DB::raw("SELECT MIN(match_time) AS Time FROM `matches`
                            WHERE (`match_date`= $today_date_timestamp) AND (`match_time` > $time_now)"));

            $smallest_time_value = $smallest_time[0]->Time;

        }

        if(isset($smallest_date_value) && !isset($smallest_time_value)){
            $smallest_date = DB::select(DB::raw("SELECT MIN(match_date) AS Date FROM `matches`
                            WHERE `match_date` > $today_date_timestamp"));

            $smallest_date_value = $smallest_date[0]->Date;

            if(isset($smallest_date_value)){
                $smallest_time = DB::select(DB::raw("SELECT MIN(match_time) AS Time FROM `matches`
                                WHERE `match_date` = $smallest_date_value"));

                $smallest_time_value = $smallest_time[0]->Time;
            }
        }

        if($smallest_date_value && $smallest_time_value){
            $matches = Match::where([
                ['matches.match_date' , '=' , $smallest_date_value] ,
                ['matches.match_time', '=', $smallest_time_value]
            ])->first();
            $team_1_id = $matches->team_1;
            $team_2_id = $matches->team_2;
            $team1 = Team::find($team_1_id);
            $team2 = Team::find($team_2_id);
            $team_1_name = $team1->team_name;
            $team_2_name = $team2->team_name;
            $team_1_logo = $team1->team_logo;
            $team_2_logo = $team2->team_logo;

            $date_time_query = DB::select(DB::raw("SELECT
                DATE_FORMAT(FROM_UNIXTIME($smallest_date_value DIV 1000), '%d-%m-%Y') AS 'closest_match_date' ,
                DATE_FORMAT(FROM_UNIXTIME($smallest_time_value DIV 1000), '%h:%i %p') AS 'closest_match_time' ,
                DATE_FORMAT(FROM_UNIXTIME(($smallest_time_value DIV 1000) + (105 * 60)), '%h:%i %p') AS 'end_match_time'"));



            $end_match_time = $date_time_query[0]->end_match_time;
            $closest_match_time = $date_time_query[0]->closest_match_time;
            $closest_match_date_php = $date_time_query[0]->closest_match_date;
            $closest_match_date_array = explode('-', $closest_match_date_php);
            $closest_match_date_js = $closest_match_date_array[1] . '/' . $closest_match_date_array[0] . '/' . $closest_match_date_array[2] . " " . $closest_match_time;
            // to have the format mm/dd/YYYY H:i A
        }
        else{
            $team_1_name = null;
            $team_1_logo = null;
            $team_2_name = null;
            $team_2_logo = null;
            $end_match_time = null;
            $closest_match_time = null;
            $closest_match_date_php = null;
            $closest_match_date_js = null;
        }

        //for the teams 6 logo and names in welcome page
        $teams = Team::select('team_name', 'team_logo')->limit(6)->get();

        return view('welcome', compact('teams', 'closest_match_date_js', 'closest_match_date_php', 'closest_match_time', 'end_match_time', 'team_1_name' , 'team_1_logo', 'team_2_name', 'team_2_logo'));
    }
}
