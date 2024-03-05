<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'available_seats' => 'required|integer|min:1',
            
        ]);

        // Create a new event with the validated data
        $event = Event::create([
            'user_id' => auth()->id(), // Assuming the authenticated user is creating the event
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'location' => $request->location,
            'category_id' => $request->category_id,
            'available_seats' => $request->available_seats,
            
        ]);

        // Return a redirect response to a specific route
        return redirect()->route('events.show', $event->id)->with('success', 'Event created successfully');
    }




}



 // public function search(Request $request)
    // {
    //     $keyword = $request->input('keyword');

     
    //     $events = Event::where('title', 'like', '%'.$keyword.'%')
    //                 ->orWhere('description', 'like', '%'.$keyword.'%')
    //                 ->get();

    //     return view('event.search', compact('events'));
    // }