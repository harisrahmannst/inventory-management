<?php

namespace App\Http\Controllers;

use App\Models\type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = type::all();

        return view('types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name_type' => 'required'
        ]);
    
        type::create($data);
    
        return redirect('/type')->with('success', 'Type created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(type $type)
    {
        return view('types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, type $type)
    {
        $data = $request->validate([
            'name_type' => 'required'
        ]);
    
        $type->update($data);
    
        return redirect('/type')->with('success', 'Type updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(type $type)
    {
        $type->delete();

        return redirect('/type')->with('success', 'Type deleted successfully.');
    }
}
