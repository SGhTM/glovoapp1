<?php

namespace App\Http\Controllers;

use App\Models\Catalogue;
use Illuminate\Http\Request;

class CatalogueController extends Controller
{
    /** 
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $catalogues=Catalogue::all(); 
        return view('catalogues.index',compact('catalogues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('catalogues.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // Validate the incoming request data
        $data = $request->validate([
            'nom_cat' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file upload if photo is included in the request
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('catalogue.index', $filename);
            $data['photo'] = 'catalogue.index/' . $filename;
        }

        // Create a new Membre instance with the validated data
        Catalogue::create($data);
        // Redirect to the specified route with success message
        return redirect()->route('catalogues.index')->with('success', 'catalogue has been created successfully.');
 
    }

    /**
     * Display the specified resource.
     */
    public function show(Catalogue $catalogue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $catalogue=Catalogue::findOrFail($id);
        return view('catalogues.edit',['catalogue' => $catalogue]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        //
         // Find the member with the given ID
         $catalogue = Catalogue::findOrFail($id);
    
         // Validate the incoming request data
         $data = $request->validate([
             'nom_cat' => 'required',
             'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
             
         ]);
     
         // Handle file upload if photo is included in the request
         if ($request->hasFile('photo')) {
             $file = $request->file('photo');
             $extension = $file->getClientOriginalExtension();
             $filename = time().'.'.$extension;
             $file->move('catalogue.index', $filename);
             $data['photo'] = 'catalogue.index/' . $filename;
         } else {
             // If no new photo uploaded, retain the existing photo path
             $data['photo'] = $catalogue->photo;
         }
     
         // Update the member record with the new data
         $catalogue->update($data);
     
         // Redirect to the index page with a success message
         return redirect()->route('catalogues.index')->with('success', 'catalogue has been updated successfully.');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $membre = Catalogue::findOrFail($id);
        $membre->delete();
        return redirect()->route('catalogues.index')->with('success', 'catalogue has been deleted successfully');
  
    }
}
