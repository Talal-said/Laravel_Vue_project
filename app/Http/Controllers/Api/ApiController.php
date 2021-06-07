<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Match;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function getMatches(Request $request){
        if(isset($request->sortField)){
            $filed = $request->sortField;
        }
        else{
            $filed = 'matches.id';
        }


        if(isset($request->sortOrder)){
            $type = $request->sortOrder;
        }
        else{
            $type = 'ASC';
        }


        if(isset($request->filter)){
            $filter = $request->filter;
        }
        else{
            $filter = '';
        }


        $matches = DB::select(DB::raw("SELECT matches.id,
        DATE_FORMAT(FROM_UNIXTIME(`match_date` DIV 1000), '%d-%m-%Y') AS 'match_date' ,
        DATE_FORMAT(FROM_UNIXTIME(`match_time` DIV 1000), '%h:%i %p ') AS 'match_time',
        teams1.team_name AS team_1_name, teams2.team_name AS team_2_name , leagues.name as league_name
        FROM matches
        JOIN leagues ON leagues.id = matches.league_id
        JOIN teams teams1 ON teams1.id = matches.team_1
        JOIN teams teams2 ON teams2.id = matches.team_2
        WHERE leagues.name LIKE '%$filter%'
        ORDER BY $filed $type
        "));


//SELECT matches.id, matches.team_1, matches.team_2,
//        DATE_FORMAT(FROM_UNIXTIME(`match_date` DIV 1000), '%d-%m-%Y') AS 'match_date' ,
//        DATE_FORMAT(FROM_UNIXTIME(`match_time` DIV 1000), '%h:%i %p ') AS 'match_time',
//teams1.team_name, teams2.team_name
//FROM matches
//JOIN leagues ON leagues.id = matches.league_id
//JOIN teams teams1 ON teams1.id = matches.team_1
//JOIN teams teams2 ON teams2.id = matches.team_2


        return response()->json(compact('matches'));
    }

    public function search(Request $request) {
        if(isset($request->teamName)){
            $teamName = $request->teamName;
        }
        else{
            $teamName = '';
        }
        if(isset($request->date)){
            $sent_Date = explode('-', $request->date);

            // checkdate(month, day, year)
            $isValidDate = checkdate($sent_Date[1], $sent_Date[0], $sent_Date[2]);
            if($isValidDate && strlen($sent_Date[2]) == 4){
            // UNIX_TIMESTAMP(year-month-day)
                $date = $sent_Date[2].'-'.$sent_Date[1].'-'.$sent_Date[0];
            }else{
                return response()->json(['error'=>'هذا التاريخ غير صالح !'], 422);
            }

            $matches = DB::select(DB::raw("SELECT matches.id,
            DATE_FORMAT(FROM_UNIXTIME(`match_date` DIV 1000), '%d-%m-%Y') AS 'match_date' ,
            DATE_FORMAT(FROM_UNIXTIME(`match_time` DIV 1000), '%h:%i %p ') AS 'match_time',
            teams1.team_name AS team_1_name, teams2.team_name AS team_2_name , leagues.name as league_name
            FROM matches
            JOIN leagues ON leagues.id = matches.league_id
            JOIN teams teams1 ON teams1.id = matches.team_1
            JOIN teams teams2 ON teams2.id = matches.team_2
            WHERE ((teams1.team_name LIKE '%$teamName%' OR teams2.team_name LIKE '%$teamName%')
            AND match_date LIKE UNIX_TIMESTAMP('$date') * 1000)"));
        }else{
            $matches = DB::select(DB::raw("SELECT matches.id,
            DATE_FORMAT(FROM_UNIXTIME(`match_date` DIV 1000), '%d-%m-%Y') AS 'match_date' ,
            DATE_FORMAT(FROM_UNIXTIME(`match_time` DIV 1000), '%h:%i %p ') AS 'match_time',
            teams1.team_name AS team_1_name, teams2.team_name AS team_2_name , leagues.name as league_name
            FROM matches
            JOIN leagues ON leagues.id = matches.league_id
            JOIN teams teams1 ON teams1.id = matches.team_1
            JOIN teams teams2 ON teams2.id = matches.team_2
            WHERE (teams1.team_name LIKE '%$teamName%' OR teams2.team_name LIKE '%$teamName%')"));
        }

//        return response()->json(['teamname'=>$teamName, 'date'=>$date]);



        return response()->json(compact('matches'));
    }

    public function register(Request $request){
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
        ];

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'password_confirmation' => $request->password_confirmation,
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }

        $record = [];
        foreach($data as $key => $value){
            if($key == 'password_confirmation'){continue;}
            if($key == 'password'){$value = bcrypt($value);}
            $record[$key] = $value;
        }
        $record['user_type'] = 'user';
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> bcrypt($request->password),
        ]);
        return response()->json(['message'=>'تم التسجيل بنجاح']);
    }

    public function login(Request $request){
        $user = User::where('email', $request->email)->first();
        if(!$user){
            return response()
            ->json(['message'=>'يبدو أن هناك مشكلة في بيانات التحقق! يرجى التأكد وإعادة المحاولة'], 401);
        }
        if(Hash::check($request->password, $user->password)){
            $token = $user->createToken('Laravel Password Grant Client')->accessToken;
            return response()->json(['access token'=>$token]);
        }else{
            return response()
            ->json(['message'=>'يبدو أن هناك مشكلة في بيانات التحقق! يرجى التأكد وإعادة المحاولة'], 422);
        }
    }
}
