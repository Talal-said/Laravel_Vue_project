<?php

namespace App\Http\Controllers;

use App\Models\League;
use App\Models\Match;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Team.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $leagues = League::all();
        return view('Team.create', compact('leagues'));
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
            'team_name' => 'required',
            'team_logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'league_id' => 'nullable',
        ], [], [
            'team_name' => 'اسم النادي',
            'team_logo' => 'شعار النادي',
            'league_id' => 'الدوري',
        ]);
        $request->file('team_logo')->move('Teams', basename($request->image_name));
        Team::create([
            'team_name' => $request->team_name,
            'team_logo' => $request->image_name,
            'league_id' => $request->league_id,
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
        $leagues = League::all();
        $team = Team::find($id);
        return view('Team.create', compact('team', 'leagues'));
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
        $team = Team::find($id);
        if($request->team_logo){
            $validatedData = $request->validate([
                'team_name' => 'required',
                'team_logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'league_id' => 'nullable',
            ], [], [
                'team_name' => 'اسم النادي',
                'team_logo' => 'شعار النادي',
                'league_id' => 'الدوري',
            ]);
            $request->file('team_logo')->move('Teams', basename($request->image_name));

            //code for deleleting the old image if the user updated the old one
            $old_file = public_path(). '/Teams/' . basename($team->team_logo);
            if(file_exists($old_file)){
                unlink($old_file);
            }

            $team->update([
                'team_name' => $request->team_name,
                'team_logo' => $request->image_name,
                'league_id' => $request->league_id,
            ]);
        }
        else{
            $validatedData = $request->validate([
                'team_name' => 'required',
                'league_id' => 'nullable',
            ], [], [
                'team_name' => 'اسم النادي',
                'league_id' => 'الدوري',
            ]);
            $team->update([
                'team_name' => $request->team_name,
                'league_id' => $request->league_id,
            ]);
        }

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
        $team = Team::find($id);
        $old_file = public_path(). '/Teams/' . basename($team->team_logo);
        if(file_exists($old_file)){
            unlink($old_file);
        }
        $team->delete();
        return response()->json(['message'=> 'تم حذف النادي بنجاح']);
    }

    public function upload(Request $request){
        $fileName = time() . '.' . $request->file->extension();
        $path = asset('Teams/'.$fileName);
        return response()->json(['name'=>$fileName,'path'=> $path]);
    }

    public function getTeams(Request $request)
    {
        $sort = json_decode($request->sort);
        if(isset($sort->fieldName) && $sort->fieldName != ""){
            $filed = $sort->fieldName;
            $type = $sort->order;
        }else{
            $filed = 'teams.id';
            $type = 'ASC';
        }
        $teams = Team::select('teams.*' , 'leagues.name as league_name')
            ->leftJoin('leagues', 'teams.league_id', '=', 'leagues.id')
            ->where(function ($filter) use ($request){
                if($request->filter){
                    $filter->where('team_name', 'like', '%'.$request->filter.'%');
                }
            })
            ->orderBy($filed, $type)
            ->orderBy('teams.id')
            ->paginate(10);
        return response()->json(compact('teams'));
    }
}
