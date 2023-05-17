<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $competitions = Competition::all();
        return response()->json(['message'=>'success','data'=>$competitions]);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'description'=>"required",
            'time'=>"required",
            'event_id'=>"required"
        ]);
        if ($validator ->fails()){
            return $validator->errors();
        }
        $competition = Competition::create($validator->validate());
        return response()->json(['message'=>'success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Competition $competition,$id)
    {
        // $competition = Competition::where('event_id',$id)->get();
        $competition = Competition::find($id);
        return response()->json(['message'=>'success','data'=>$competition]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Competition $competition, $id)
    {   
        $competition = Competition::find($id);
        $validator = Validator::make($request->all(),[
            'description'=>"required",
            'time'=>"required",
            'event_id'=>"required"
        ]);
        if ($validator ->fails()){
            return $validator->errors();
        }
        $competition->update($validator->validate());
        return response()->json(['message'=>'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Competition $competition, $id)
    {
        $competition = Competition::find($id);
        $competition->delete();
        return response()->json(['message'=>'success']);
    }

    public function getAllCompetitionById($id){
        $competition = Competition::where('event_id',$id)->get();
        return response()->json(['message'=>'success','data'=>$competition],200);
    }

    

   
  
}
