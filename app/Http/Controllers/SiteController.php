<?php

namespace App\Http\Controllers;

use App\Models\site;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sites = site::all();
        
        return view('sites.index', compact('sites'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sites.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name_site' => 'required'
        ]);
    
        site::create($data);
    
        return redirect('/site')->with('success', 'Site created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(site $site)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(site $site)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, site $site)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(site $site)
    {
        //
    }
}
