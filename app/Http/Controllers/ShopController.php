<?php

namespace App\Http\Controllers;

use App\Models\Catalogue;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource. 
     */
    public function index(Request $request)
    { 
        //
        // $shops=Shop::all(); 
        // $shops = Shop::where('name', $catalog)->first()->shops;
        // return view('shops.index',compact('shops'));
        
        // Check if catalogue_id is provided in the request
    if ($request->has('catalogue_id')) {
        // Retrieve the catalogue based on the provided ID
        $catalogue = Catalogue::findOrFail($request->catalogue_id);
        
        // Retrieve the shops associated with the catalogue
        $shops = $catalogue->shops()->get();
    } else {
        // If catalogue_id is not provided, retrieve all shops
        $shops = Shop::all();
    }

    // Pass the shops data to the view
    return view('shops.index', compact('shops'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('shops.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // Validate the incoming request data
        $data = $request->validate([
            'nom_shop' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'catalogue_id' => 'required',
        ]);

        // Handle file upload if photo is included in the request
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('shop.index', $filename);
            $data['photo'] = 'shop.index/' . $filename;
        }

        // Create a new Membre instance with the validated data
        Shop::create($data);
        // Redirect to the specified route with success message
        return redirect()->route('shops.index')->with('success', 'Shop has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Shop $shop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit ($id)
    {
        //
        $shops=Shop::findOrFail($id);
        return view('shops.edit',['shop' => $shops]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
         // Find the member with the given ID
         $shop = Shop::findOrFail($id);
    
         // Validate the incoming request data
         $data = $request->validate([
             'nom_shop' => 'required',
             'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
             'catalogue_id' => 'required',
         ]);
     
         // Handle file upload if photo is included in the request
         if ($request->hasFile('photo')) {
             $file = $request->file('photo');
             $extension = $file->getClientOriginalExtension();
             $filename = time().'.'.$extension;
             $file->move('shop.index', $filename);
             $data['photo'] = 'shop.index/' . $filename;
         } else {
             // If no new photo uploaded, retain the existing photo path
             $data['photo'] = $shop->photo;
         }
     
         // Update the member record with the new data
         $shop->update($data);
     
         // Redirect to the index page with a success message
         return redirect()->route('shops.index')->with('success', 'shop has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $shop = Shop::findOrFail($id);
        $shop->delete();
        return redirect()->route('shops.index')->with('success', 'Shop has been deleted successfully');
    }
}
