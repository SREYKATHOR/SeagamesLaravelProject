<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'event_id'=>"required"
        ]);
        if ($validator->fails()){
            return $validator->errors();
        }
        $event = Event::find(request('event_id'));
        if ($event->total_ticket <=0){
            return response()->json(['message'=>'Ticket is sold out'],200);
        }
        
        $booking = Ticket::create($validator->validate());
        $event->update([
            'total_ticket'=>$event['total_ticket'] -1
        ]);
        return response()->json(['message'=>'Booking successfully!'],200);
    

    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
