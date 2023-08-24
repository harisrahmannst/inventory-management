<?php

namespace App\Http\Controllers;

use App\Models\brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = brand::all();
        return view('brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name_brand' => 'required'
        ]);

        brand::create($data);

        return redirect('/brand')->with('success', 'Brand created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(brand $brand)
    {
        return view('brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, brand $brand)
    {
        $data = $request->validate([
            'name_brand' => 'required'
        ]);

        $brand->update($data);

        return redirect('/brand')->with('success', 'Brand updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(brand $brand)
    {
        $brand->delete();

        return redirect('/brand')->with('success', 'Brand deleted successfully.');
    }
}
