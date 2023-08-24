<?php

namespace App\Http\Controllers;

use App\Models\location;
use App\Models\site;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = location::with('site')->get();
        
        return view('locations.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sites = site::all();
        return view('locations.create', compact('sites'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name_location' => 'required',
            'site_id' => 'required|exists:sites,id',
        ]);
    
        Location::create($data);
    
        return redirect('/location')->with('success', 'Location created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(location $location)
    {
        $sites = site::all();

        return view('locations.edit', compact('location', 'sites'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, location $location)
    {
        $data = $request->validate([
            'name_location' => 'required',
            'site_id' => 'required|exists:sites,id',
        ]);
    
        $location->update($data);
    
        return redirect('/location')->with('success', 'Location created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(location $location)
    {
        $location->delete();

        return redirect('/location')->with('success', 'Location deleted successfully.');
    }
}
