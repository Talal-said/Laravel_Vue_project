<?php

namespace App\Http\Controllers;

use App\Models\League;
use Illuminate\Http\Request;

class testContoller extends Controller
{
    public function getProducts(Request $request){
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
