<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Http\Controllers\Auth;


class EvenementController extends Controller
{

    public function viewAll()
    {
        // $user = Auth::id();
        $categories = Categorie::all();
        $evenements = Event::orderby('created_at', 'desc')
            ->get();
        // dd($evenements);
        return view('admin.allEvents', compact('evenements'), compact('categories'));
    }

    // public function viewClient()
    // {
    //     // $user = Auth::id();
    //     $evenements = Event::where('statut', "Accepted")
    //     ->orderby('created_at', 'desc')
    //     ->get();
    //     // dd($evenements);
    //     return view('client.evenement', compact('evenements'));
    // }



    // public function view()
    // {
    //     // $user = Auth::id();
    //     $categories = Categorie::all();
    //     $evenements = Event::where('user_id', $user)
    //         ->orderby('created_at', 'desc')
    //         ->get();
    //     // dd($evenements);
    //     return view('organisateur.evenement', compact('evenements'), compact('categories'));
    // }

    public function create(Request $request)
    {
        try {
            $request->validate([
                'titre' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string'],
                'lieu' => ['required', 'string', 'max:255'],
                'places' => 'required',
                'mode' => ['required', 'string', 'in:automatique,manuelle'],
            ]);
            $user = auth()->user();
            Event::create([
                'titre' => $request->titre,
                'description' => $request->description,
                'date' => now()->toDateString(),
                'lieu' =>  $request->lieu,
                'places' => $request->places,
                'mode' => $request->mode,
                'user_id' => $user->id,
                'categorie_id' => $request->categorieID,
            ]);
            return redirect()->route('Evenements');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    // public function updateStatus(Request $request, $eventId)
    // {
    //     $request->validate([
    //         'statut' => 'required|in:Accepted,Rejected',
    //     ]);
    //     $event = Event::findOrFail($eventId);
    //     $event->statut = $request->statut;
    //     $event->save();
    //     return back();
    // }

    public function delete(Event $evenement)
    {
        $evenement->delete();
        return redirect()->route('Evenements');
    }

    // public function update(Request $request)
    // {
    //     try {
    //         $request->validate([
    //             'titre' => ['required', 'string', 'max:255'],
    //             'description' => ['required', 'string'],
    //             'lieu' => ['required', 'string'],
    //             'places' => ['required', 'integer'],
    //             'mode' => ['required', 'in:automatique,manuelle'],
    //         ]);

    //         $event = Event::findOrFail($request->event_id);

    //         $event->update([
    //             'titre' => $request->titre,
    //             'description' => $request->description,
    //             'lieu' => $request->lieu,
    //             'places' => $request->places,
    //             'mode' => $request->mode,
    //             'categorie_id' => $request->categorie,
    //             'statut' => "Pending",
    //         ]);

    //         return redirect()->route('Evenements')->with('success', 'Event updated successfully');
    //     } catch (\Exception $e) {
    //         return redirect()->route('Evenements')->with('error', 'Error updating event');
    //     }
    // }

    // public function showDetails($id)
    // {
    //     $event = Event::findOrFail($id);

    //     return view('client.eventDetails', compact('event'));
    // }
}




































// class EventController extends Controller
// {
//     public function index()
//     {
//         $categories = Categorie::all(); // Assuming Category is your model for categories
//         return view('organisateur.events', compact('categories'));
//     }
    

//     public function store(Request $request)
//     {
//         // Validation
//         $request->validate([
//             'title' => 'required|string|max:255',
//             'description' => 'required|string',
//             'date' => 'required|date',
//             'location' => 'required|string|max:255',
//             'category_id' => 'required|exists:categories,id',
//         ]);
    
//         // Creating event
//         $event = Event::create([
//             'user_id' => auth()->id(), // Assuming the authenticated user is creating the event
//             'title' => $request->title,
//             'description' => $request->description,
//             'date' => $request->date,
//             'location' => $request->location,
//             'category_id' => $request->category_id,
//             'places' => 0, // Set default value or change it as needed
//             'mode' => 'mode_value', // Fill with appropriate value
//             'statut' => 'statut_value', // Fill with appropriate value
//         ]);
    
//         // Redirecting
//         return redirect()->route('events.show', $event->id)->with('success', 'Event created successfully');
//     }
    

//     public function show($id)
//     {
//         // Fetch the event details from the database
//         $event = Event::findOrFail($id);

//         // Return the view with the event details
//         return view('events.show', compact('event'));
//     }
// }



 // public function search(Request $request)
    // {
    //     $keyword = $request->input('keyword');

     
    //     $events = Event::where('title', 'like', '%'.$keyword.'%')
    //                 ->orWhere('description', 'like', '%'.$keyword.'%')
    //                 ->get();

    //     return view('event.search', compact('events'));
    // }