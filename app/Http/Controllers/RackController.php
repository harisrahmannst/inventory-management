<?php

namespace App\Http\Controllers;

use App\Models\location;
use App\Models\rack;
use Illuminate\Http\Request;

class RackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $racks = rack::with('location')->get();
        
        return view('racks.index', compact('racks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $locations = location::all();
        return view('racks.create', compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name_rack' => 'required',
            'location_id' => 'required|exists:location,id',
        ]);
    
        rack::create($data);
    
        return redirect('/rack')->with('success', 'Rack created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(rack $rack)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(rack $rack)
    {
        $locations = location::all();

        return view('racks.edit', compact('rack', 'locations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, rack $rack)
    {
        $data = $request->validate([
            'name_rack' => 'required',
            'location_id' => 'required|exists:sites,id',
        ]);
    
        $rack->update($data);
    
        return redirect('/rack')->with('success', 'Rack created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(rack $rack)
    {
        $rack->delete();

        return redirect('/rack')->with('success', 'Rack deleted successfully.');
    }
}
