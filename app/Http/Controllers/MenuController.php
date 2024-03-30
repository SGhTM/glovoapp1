<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Shop;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // 
        // $menus=Menu::all();
        // return view('menus.index',compact('menus'));
           // Check if catalogue_id is provided in the request
    if ($request->has('shop_id')) {
        // Retrieve the catalogue based on the provided ID
        $shop = Shop::findOrFail($request->shop_id);
        
        // Retrieve the shops associated with the catalogue
        $menus = $shop->menus()->get();
    } else {
        // If catalogue_id is not provided, retrieve all shops
        $shops = Shop::all();
    }

    // Pass the shops data to the view
    return view('menus.index',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $data = $request->validate([
            'article' => 'required',
            'prix' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'shop_id' => 'required',
        ]); 

        // Handle file upload if photo is included in the request
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('menu.index', $filename);
            $data['photo'] = 'menu.index/' . $filename;
        }

        // Create a new Membre instance with the validated data
        Menu::create($data);
        // Redirect to the specified route with success message
        return redirect()->route('menus.index')->with('success', 'Menu has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $menus=Menu::findOrFail($id);
        return view('menus.edit',['menu' => $menus]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
         // Find the member with the given ID
         $menu = Menu::findOrFail($id);
    
         // Validate the incoming request data
         $data = $request->validate([
            'article' => 'required',
            'prix' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'shop_id' => 'required',
        ]);
     
         // Handle file upload if photo is included in the request
         if ($request->hasFile('photo')) {
             $file = $request->file('photo');
             $extension = $file->getClientOriginalExtension();
             $filename = time().'.'.$extension;
             $file->move('menu.index', $filename);
             $data['photo'] = 'menu.index/' . $filename;
         } else {
             // If no new photo uploaded, retain the existing photo path
             $data['photo'] = $menu->photo;
         }
     
         // Update the member record with the new data
         $menu->update($data);
     
         // Redirect to the index page with a success message
         return redirect()->route('menus.index')->with('success', 'Menu has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        //
        $menu = Menu::findOrFail($id);
        $menu->delete();
        return redirect()->route('menus.index')->with('success', 'Menu has been deleted successfully');
    }
}
