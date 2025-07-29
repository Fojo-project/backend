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
    public function index(Request $request)
    {
        $limit = $request->query('limit', 10);
        $events = Event::orderBy('start_date')
            ->orderBy('start_time')
            ->paginate($limit);
        return $this->paginatedResponse(EventResource::collection($events), 'Events retrieved successfully.', 200);
    }

    public function scheduledEvents(Request $request)
    {
        $limit = $request->query('limit', 10);
        $events = Event::scheduled()->latest()->paginate($limit);
        return $this->paginatedResponse(EventResource::collection($events), 'Scheduled events retrieved successfully.', 200);
    }

    public function liveEvents(Request $request)
    {
        $limit = $request->query('limit', 10);
        $events = Event::live()->latest()->paginate($limit);
        return $this->paginatedResponse(EventResource::collection($events), 'Live events retrieved successfully.', 200);
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
