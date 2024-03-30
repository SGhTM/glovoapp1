<?php

namespace App\Http\Controllers;

use App\Models\Detail_bl;
use Illuminate\Http\Request;

class DetailBlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $details=Detail_bl::all();
        return view('details.index',compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('details.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'qte' => 'required',
            'panier_id' => 'required',
            'menu_id' => 'required',
        ]);

        Detail_bl::create($data);
        return redirect()->route('details.index')->with('success', 'Detail has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Detail_bl $detail_bl)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $details=Detail_bl::findOrFail($id);
        return view('details.edit',['details' => $details]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
         // Find the detail or throw a 404 error if not found
        $detail = Detail_bl::findOrFail($id);

        // Validate the incoming request data
        $data = $request->validate([
            'qte' => 'required',
            'panier_id' => 'required',
            'menu_id' => 'required',
        ]);

        // Update the Detail_bl instance with the validated data
        $detail->update($data);

        // Redirect to the index page with a success message
        return redirect()->route('details.index')->with('success', 'Detail has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $details = Detail_bl::findOrFail($id);
        $details->delete();
        return redirect()->route('details.index')->with('fail', 'Detail has been deleted successfully');
    }
}
