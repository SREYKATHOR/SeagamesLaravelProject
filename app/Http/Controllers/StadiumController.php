<?php

namespace App\Http\Controllers;

use App\Models\Stadium;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\returnSelf;

class StadiumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stadia = Stadium::all();
        return response()->json(['message'=>"success","data"=>$stadia]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'stadium_name'=>"required|min:2|unique:stadia,studium_name",
            'number_of_seat'=>"required",
            'address'=>"required|min:2"
        ]);
        if($validator->fails()){
            return response()->errors();
        }
        $stadium = Stadium::create($validator->validate());
        return response()->json(['message'=>'success']);

    }

    /**
     * Display the specified resource.
     */
    public function show(Stadium $stadium, $id)
    {
        $stadium = Stadium::find($id);
        return response()->json(['message'=>'success','data'=>$stadium]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stadium $stadium , $id)
    {
        $stadium = Stadium::find($id);
        $validator = Validator::make($request->all(),[
            'stadium_name'=>"required|min:2|unique:stadia",
            'number_of_seat'=>"required",
            'address'=>"required|min:2"
        ]);
        if($validator->fails()){
            return $validator->errors();
        }
        $stadium->update($validator->validate());
        return response()->json(['message'=>'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stadium $stadium,$id)
    {
        $stadium = Stadium::find($id);
        $stadium->delete();
        return response()->json(['message'=>'success']);
    }
}
