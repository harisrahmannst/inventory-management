<?php

namespace App\Http\Controllers;

use App\Models\device;
use App\Models\type;
use App\Models\brand;
use App\Models\site;
use App\Models\location;
use App\Models\rack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $devices = device::all();
        return view('devices.index', compact('devices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $locations = location::all();
        $sites = site::all();
        $brands = brand::all();
        $types = type::all();
        $racks = rack::all();
        return view('devices.create', compact('types', 'brands', 'sites', 'locations', 'racks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, device $device)
    {
        //
        $request->validate([
            'device_name' => 'required',
            'device_brand_id' => 'required',
            'serial_number' => 'required',
            'device_type_id' => 'required',
            'device_site_id' => 'required',
            'device_location_id' => 'required',
            'device_rack_id' => 'required',
            'device_status' => 'required',
            'device_image' => 'required',
            'device_describtion' => 'required',
        ]);

        $file = $request->file('device_image');

        $path = time() . '_' . $request->device_name . '.' . $file->getClientOriginalExtension();
        Storage::disk('local')->put('public/images/' . $path, file_get_contents($file));

        $device->create([
            'device_name' => $request->device_name,
            'device_brand_id' => $request->device_brand_id,
            'serial_number' => $request->serial_number,
            'device_type_id' => $request->device_type_id,
            'device_site_id' => $request->device_site_id,
            'device_location_id' => $request->device_location_id,
            'device_rack_id' => $request->device_rack_id,
            'device_status' => $request->device_status,
            'device_describtion' => $request->device_describtion,
            'device_image' => $path
        ]);

        return redirect()->route('device.index')
        ->with('success', 'Asset Created Successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(device $device)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(device $device)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, device $device)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(device $device)
    {
        //
        $device->delete();

        return redirect('/device')->with('success', 'Asset deleted successfully.');
    }
}
