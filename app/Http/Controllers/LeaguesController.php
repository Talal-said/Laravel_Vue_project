<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LeaguesController extends Controller
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
            'price' => 'required',
            'image' => 'required',
            'details' => 'required',
        ], [], [
            'name' => 'اسم المنتج',
            'price' => 'سعر المنتج',
            'image' => 'صورة المنتج',
            'details' => 'تفاصيل المنتج',
        ]);
        $request->file('file')->move('products', $request->imageName);
        Products::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $request->image,
            'details' => $request->details,
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
        $league = Products::find($id);
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
            'price' => 'required',
            'image' => 'required',
            'details' => 'required',
        ], [], [
            'name' => 'اسم المنتج',
            'price' => 'سعر المنتج',
            'image' => 'صورة المنتج',
            'details' => 'تفاصيل المنتج',
        ]);
        $product = Products::find($id);
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $request->image,
            'details' => $request->details,
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
        Products::find($id)->delete();
        return response()->json(['message'=> 'تم حذف المنتج بنجاح']);
    }

    public function upload(Request $request){
        $fileName = time() . '.' . $request->file->extension();
        $path = asset('Teams/'.$fileName);
        return response()->json(['name'=>$fileName,'path'=> $path]);
    }
}
