<?php

namespace App\Http\Controllers;

use App\Models\Mode;
use Illuminate\Http\Request;

class ModeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modes=Mode::all(); 
        return view('modes.index',compact('modes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('modes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'mode' => 'required',
        ]);

        // Create a new Membre instance with the validated data
        Mode::create($data);
        // Redirect to the specified route with success message
        return redirect()->route('modes.index')->with('success', 'Mode has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mode $mode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $modes=Mode::findOrFail($id);
        return view('modes.edit',['mode' => $modes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $mode = Mode::findOrFail($id);
        $data = $request->validate([
            'mode' => 'required',
        ]);

        $mode->update($data);
     
         // Redirect to the index page with a success message
         return redirect()->route('modes.index')->with('success', 'Mode has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $mode = Mode::findOrFail($id);
        $mode->delete();
        return redirect()->route('modes.index')->with('success', 'Mode has been deleted successfully');
    }
}
