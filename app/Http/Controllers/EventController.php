<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\Categorie;

class EventController extends Controller
{
    public function index()
    {
        $categories = Categorie::all(); // Assuming Category is your model for categories
        return view('organisateur.events', compact('categories'));
    }
    

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);
    
        // Creating event
        $event = Event::create([
            'user_id' => auth()->id(), // Assuming the authenticated user is creating the event
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'location' => $request->location,
            'category_id' => $request->category_id,
            'places' => 0, // Set default value or change it as needed
            'mode' => 'mode_value', // Fill with appropriate value
            'statut' => 'statut_value', // Fill with appropriate value
        ]);
    
        // Redirecting
        return redirect()->route('events.show', $event->id)->with('success', 'Event created successfully');
    }
    

    public function show($id)
    {
        // Fetch the event details from the database
        $event = Event::findOrFail($id);

        // Return the view with the event details
        return view('events.show', compact('event'));
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