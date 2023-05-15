<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sports = Sport::all();
        return response()->json(['message'=>'success','data'=>$sports]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required|unique:sports|min:2'
        ]);
        if ($validator ->fails()){
            return $validator->errors();
        }
        $sport = Sport::create($validator->validate());
        return response()->json(['message'=>'success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Sport $sport,$id)
    {
        $sport = Sport::find($id);
        return response()->json(['message'=>'success','data'=>$sport]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sport $sport,$id)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required|unique:sports|min:2'
        ]);
        $sport = Sport::find($id);
        if ($validator ->fails()){
            return $validator->errors();
        }
        $sport->update($validator->validate());
        return response()->json(['message'=>'success','data'=>$sport]);
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sport $sport,$id)
    {
        $sport = Sport::find($id);
        $sport->destroy();
        return response()->json(['message'=>'delete success']);

    }
}
