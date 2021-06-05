<?php

namespace App\Http\Controllers;

use App\Models\League;
use Illuminate\Http\Request;

class myController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('League.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('League.create');
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
            'name' => 'required',
        ], [], [
            'name' => 'اسم الدوري',
        ]);
        League::create([
            'name' => $request->name,
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
        $league = League::find($id);
        return view('League.create', compact('league'));
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
            'name' => 'required',
        ], [], [
            'name' => 'اسم الدوري',
        ]);
        $league = League::find($id);
        $league->update([
            'name' => $request->name,
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
        League::find($id)->delete();
        return response()->json(['message'=> 'تم حذف الدوري بنجاح']);
    }
    public function getData(Request $request)
    {
        $sort = json_decode($request->sort);
        if(isset($sort->fieldName) && $sort->fieldName != ""){
            $filed = $sort->fieldName;
            $type = $sort->order;
        }else{
            $filed = 'id';
            $type = 'ASC';
        }
        $leagues = League::where(function ($filter) use ($request){
            if($request->filter){
                $filter->where('name', 'like', '%'.$request->filter.'%');
            }
        })->orderBy($filed, $type)->paginate(10);
        return response()->json(compact('leagues'));
    }
}
