<?php

namespace App\Http\Controllers;

use App\Http\Resources\EventResource;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::orderBy('start_date')
            ->orderBy('start_time')
            ->get();

        return $this->successResponse(EventResource::collection($events), 'Events retrieved successfully.', 200);
    }

    public function upcomingEvents()
    {
        $now = Carbon::now();
        $today = $now->toDateString();
        $time = $now->toTimeString();

        $events = Event::where(function ($query) use ($today, $time) {
            $query->where('start_date', '>', $today)
                ->orWhere(function ($query) use ($today, $time) {
                    $query->where('start_date', $today)
                        ->where('start_time', '>=', $time);
                });
        })->orderBy('start_date')->orderBy('start_time')->get();
    }

    public function scheduledEvents()
    {
        $events = Event::scheduled()->latest()->get();
        return $this->successResponse(EventResource::collection($events), 'Scheduled events retrieved successfully.', 200);
    }

    public function liveEvents()
    {
        $events = Event::live()->latest()->get();
        return $this->successResponse(EventResource::collection($events), 'Live events retrieved successfully.', 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return $this->successResponse(new EventResource($event), 'Events retrieved successfully.', 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
