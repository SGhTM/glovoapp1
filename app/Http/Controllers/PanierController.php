<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use Illuminate\Http\Request;

class PanierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $paniers=Panier::all();
        return view('paniers.index',compact('paniers')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('paniers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'date' => 'required',
            'heure' => 'required',
            'utilisateur_id' => 'required',
            'menu_id' => 'required',
        ]);

        Panier::create($data);
        return redirect()->route('paniers.index')->with('success', 'Panier has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Panier $panier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $paniers=Panier::findOrFail($id);
        return view('paniers.edit',['paniers' => $paniers]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $panier = Panier::findOrFail($id);

        $data = $request->validate([
            'date' => 'required',
            'heure' => 'required',
            'utilisateur_id' => 'required',
            'menu_id' => 'required',
        ]);

        $panier->update($data);
        return redirect()->route('paniers.index')->with('success', 'Panier has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $panier = Panier::findOrFail($id);
        $panier->delete();
        return redirect()->route('paniers.index')->with('fail', 'Panier has been deleted successfully');
    }
}
