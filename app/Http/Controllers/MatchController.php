<?php

namespace App\Http\Controllers;

use App\Models\League;
use App\Models\Match;
use App\Models\Team;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Match.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::all();
        $leagues = League::all();
        return view('Match.create', compact('teams', 'leagues'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'league_id' => 'required|exists:leagues,id',
            'team_1' => 'required|exists:teams,id',
            'team_2' => 'required|exists:teams,id',
            'match_time' => 'required',
            'match_date' => 'required',
        ], [], [
            'league_id' => 'اسم الدوري',
            'team_1' => 'اسم الفريق الأول',
            'team_2' => 'اسم الفريق الثاني',
            'match_time' => 'وثت المباراة',
            'match_date' => 'تاريخ المباراة',
        ]);
        Match::create([
            'league_id' => $request->league_id,
            'team_1' => $request->team_1,
            'team_2' => $request->team_2,
            'match_time' => $request->match_time,
            'match_date' => $request->match_date,
        ]);
        return response()->json(['message' => 'تم الإضافة بنجاح']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $match = Match::find($id);
        $teams = Team::all();
        $leagues = League::all();
        return view('Match.create', compact('match','teams','leagues'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'league_id' => 'required|exists:leagues,id',
            'team_1' => 'required|exists:teams,id',
            'team_2' => 'required|exists:teams,id',
            'match_time' => 'required',
            'match_date' => 'required',
        ], [], [
            'league_id' => 'اسم الدوري',
            'team_1' => 'اسم الفريق الأول',
            'team_2' => 'اسم الفريق الثاني',
            'match_time' => 'وثت المباراة',
            'match_date' => 'تاريخ المباراة',
        ]);
        $match = Match::find($id);
        $match->update([
            'league_id' => $request->league_id,
            'team_1' => $request->team_1,
            'team_2' => $request->team_2,
            'match_time' => $request->match_time,
            'match_date' => $request->match_date,
        ]);
        return response()->json(['message' => 'تم التعديل بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Match::find($id)->delete();
        return response()->json(['message'=> 'تم حذف المباراة بنجاح']);
    }

    public function getMatches(Request $request)
    {
        $sort = json_decode($request->sort);
        if(isset($sort->fieldName) && $sort->fieldName != ""){
            $filed = $sort->fieldName;
            $type = $sort->order;
        }else{
            $filed = 'matches.id';
            $type = 'ASC';
        }
//        $matches = Match::with(['league' , 'team1' , 'team2'])->where(function ($filter) use ($request){
//            if($request->filter){
//                $filter->where('league_id', 'like', '%'.$request->filter.'%');
//            }
//        })->orderBy('leagues.id', $type)->paginate(10);

//SELECT matches.id, matches.team_1, matches.team_2,
//teams1.team_name, teams2.team_name
//FROM matches
//JOIN leagues ON leagues.id = matches.league_id
//JOIN teams teams1 ON teams1.id = matches.team_1
//JOIN teams teams2 ON teams2.id = matches.team_2


        $matches = Match::select('matches.*' , 'leagues.name as league_name' ,
            't1.team_name as Team_1_name' , 't2.team_name as Team_2_name')
            ->join('leagues', 'matches.league_id', '=', 'leagues.id')
            ->join('teams as t1', 't1.id', '=', 'matches.team_1')
            ->join('teams as t2', 't2.id', '=', 'matches.team_2')
            ->where(function ($filter) use ($request){
                if($request->filter){
                    $filter->where('leagues.name', 'like', '%'.$request->filter.'%');
                }
              })
            ->orderBy($filed, $type)
            ->orderBy('matches.id')
            ->paginate(10);
        return response()->json(compact('matches'));
    }
}
