<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{

    public function view(){
        $categories = Categorie::all();
        return view('admin.categorie', compact('categories'));
    }

    public function create(Request $request){
        try{
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
            ]);
    
            $user = Auth::user();
    
            Categorie::create([
                'name' => $request->name,
                'user_id' => $user->id,
            ]);
            return redirect()->route('categories');
        } catch(\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
            ]);
                $oneCategorie = Categorie::findOrFail($request->categorieID);
    
            $oneCategorie->update([
                'name' => $request->nom,
            ]);
    
            return redirect()->route('categories');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
    
    public function delete(Categorie $categorie){
        $categorie->delete();
        return redirect()->route('categories');
    }
}