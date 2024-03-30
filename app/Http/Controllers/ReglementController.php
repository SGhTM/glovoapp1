<?php

namespace App\Http\Controllers;

use App\Models\Reglement;
use Illuminate\Http\Request;

class ReglementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reglements=Reglement::all();
        return view('reglements.index',compact('reglements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reglements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'montant' => 'required',
            'detail_id' => 'required',
            'mode_id' => 'required',
        ]);

        Reglement::create($data);
        return redirect()->route('reglements.index')->with('success', 'reglement has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reglement $reglement)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $reglements=Reglement::findOrFail($id);
        return view('reglements.edit',['reglement' => $reglements]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $reglements = Reglement::findOrFail($id);

        $data = $request->validate([
            'montant' => 'required',
            'detail_id' => 'required',
            'mode_id' => 'required',
        ]);

        $reglements->update($data);
        return redirect()->route('reglements.index')->with('success', 'Reglement has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $reglements = Reglement::findOrFail($id);
        $reglements->delete();
        return redirect()->route('reglements.index')->with('fail', 'Reglement has been deleted successfully');
    }
}
