<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $utilisateurs=Utilisateur::all();
        return view('utilisateurs.index',compact('utilisateurs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('utilisateurs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $data = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'adresse' => 'required',
            'ville' => 'required',
            'email' => 'required',
            'password' => 'required|min:6|max:30|confirmed',
        ]);
        $data['password'] = Hash::make($request->password);

        Utilisateur::create($data);
        return redirect()->route('utilisateurs.index')->with('success', 'utilisateur has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Utilisateur $utilisateur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $utilisateurs=Utilisateur::findOrFail($id);
        return view('utilisateurs.edit',['utilisateur' => $utilisateurs]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
         // Find the member with the given ID
         $utilisateur = Utilisateur::findOrFail($id);
    
         // Validate the incoming request data
         $data = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'adresse' => 'required',
            'ville' => 'required',
            'email' => 'required',
            'password' => 'required|min:6|max:30|confirmed',
        ]);
         
        $data['password'] = Hash::make($request->password);
     
         // Update the member record with the new data
         $utilisateur->update($data);
     
         // Redirect to the index page with a success message
         return redirect()->route('utilisateurs.index')->with('success', 'utilisateur has been updated successfully.');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        //
        $utilisateur = Utilisateur::findOrFail($id);
        $utilisateur->delete();
        return redirect()->route('utilisateurs.index')->with('success', 'utilisateur has been deleted successfully');
    }
    
}
