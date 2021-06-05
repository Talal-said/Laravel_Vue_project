<?php

namespace App\Http\Controllers;

use App\Models\Match;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomePageController extends Controller
{
    public function getData(){
        $smallest_date = DB::select(DB::raw("SELECT MIN(match_date) AS Date FROM `matches`"));
        $smallest_date_value = $smallest_date[0]->Date;
        $smallest_time = DB::select(DB::raw("SELECT MIN(match_time) AS Time FROM `matches` WHERE `match_date` = $smallest_date_value"));
        $smallest_time_value = $smallest_time[0]->Time;
        $matches = Match::where([
                        ['matches.match_date' , '=' , $smallest_date_value] ,
                        ['matches.match_time', '=', $smallest_time_value]
                    ])->get();
        $team_1_id = $matches[0]->team_1;
        $team_2_id = $matches[0]->team_2;
        $team1 = Team::find($team_1_id);
        $team2 = Team::find($team_2_id);
        $team_1_name = $team1->team_name;
        $team_2_name = $team2->team_name;
        $team_1_logo = $team1->team_logo;
        $team_2_logo = $team2->team_logo;
        $end_match_time = "<script>
            var timestamp = $smallest_time_value;
            var end_time = new Date(timestamp + 105*60000);
            // add 105 min (45 min * 2 + 15)
            var formatted_time = end_time.toLocaleTimeString('en-US', {hour: '2-digit', minute: '2-digit', hour12: true});
            document.write(formatted_time);
        </script>";
        $date = "<script>
            var timestamp = $smallest_date_value;
            var date_not_formatted = new Date(timestamp);

            var formatted_string = date_not_formatted.getFullYear() + '/';
            // e.g. : 2016/
            if (date_not_formatted.getMonth() < 9) {
              formatted_string += '0';
            }
            // e.g. : 2 -> 02
            formatted_string += (date_not_formatted.getMonth() + 1);
            // e.g. : 0 = January -> 1 = January
            formatted_string += '/';
            // e.g. : 2016/02/
            if(date_not_formatted.getDate() < 10) {
              formatted_string += '0';
            }
            // e.g. : 8 -> 08
            formatted_string += date_not_formatted.getDate();
            // e.g. : 2016/02/08
            document.write(formatted_string);
            </script>";

        $time = "<script>
        var timestamp = $smallest_time_value;
        var time_not_formatted = new Date(timestamp);
        var formatted_time = time_not_formatted.toLocaleTimeString('en-US', {hour: '2-digit', minute: '2-digit', hour12: true});
        document.write(formatted_time);
        </script>";
        $teams = Team::select('team_name', 'team_logo')->limit(6)->get();
        return view('welcome', compact('teams', 'date', 'time', 'end_match_time', 'team_1_name' , 'team_1_logo', 'team_2_name', 'team_2_logo'));
    }
}
