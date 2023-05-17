<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Sport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\returnSelf;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        return response()->json(['message'=>"success",'data'=>$events]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'date'=>"required",
            'total_ticket'=>"required|max:35000",
            'sport_id'=>"required",
            'stadium_id'=>"required"
        ]);
        if ($validator ->fails()){
            return $validator->errors();
        }
        $event = Event::create($validator->validate());
        return response()->json(['message'=>'success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event , $id)
    {
        $event = Event::find($id);
        return response()->json(['message'=>'success','data'=>$event]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event, $id)
    {   
        $event = Event::find($id);
        $validator = Validator::make($request->all(),[
            'date'=>"required",
            'sport_id'=>"required",
            'stadium_id'=>"required"
        ]);
        if ($validator ->fails()){
            return $validator->errors();
        }
        $event->update($validator->validate());
        return response()->json(['message'=>'success','data'=>$event]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $event = Event::find($id);
        $event->delete();
        return response()->json(['message'=>'success'],200);
        
    }


    public function searchEvent($name_sport){
        $event = Event::leftJoin('competitions','events.id','=','competitions.event_id')
        ->leftJoin('sports','events.sport_id','=','sports.id')
        ->where('sports.name','like','%'.$name_sport.'%')->get();

        return response()->json(['message' => 'success', 'data' => $event], 200);
        
    }
    public function detailEvent($id){
        $event = Event::leftJoin('competitions','events.id','=','competitions.event_id')
        ->leftJoin('sports','events.sport_id','=','sports.id')
        ->leftJoin('stadia','events.stadium_id','=','stadia.id')
        ->select('sports.name','competitions.description','events.date','competitions.time',
        'stadia.stadium_name','stadia.number_of_seat','stadia.address')
        ->where('events.id',$id)->get();

        return response()->json(['message' => 'success', 'data' => $event], 200);
        
    }
}
