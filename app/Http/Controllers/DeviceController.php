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
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Excel;
use App\Exports\ExportsDevice;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

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
    public function show(Request $request, device $device)
    {
        //
        $filename = $this->generateQRCode($request, $device);
        return view('devices.show', compact('device', 'filename'));
    }

    public function generateQRCode(Request $request, device $device)
    {
        $url = $request->url();
        $filename = $device->device_name . '.png';

        // Generate the QR code
        $qrCode = QrCode::format('png')->size(300)->generate($url);

        // Save the QR code to storage
        Storage::put('public/images/qrcodes/' . $filename, $qrCode);

        // Return the path to the saved QR code
        return 'public/images/qrcodes/' . $filename;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(device $device)
    {
        //
        $locations = location::all();
        $sites = site::all();
        $brands = brand::all();
        $types = type::all();
        $racks = rack::all();
        return view('devices.edit', compact('device','types', 'brands', 'sites', 'locations', 'racks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, device $device)
    {
        //
        $data = $request->validate([
            'device_name' => 'required',
            'device_brand_id' => 'required',
            'serial_number' => 'required',
            'device_type_id' => 'required',
            'device_site_id' => 'required',
            'device_location_id' => 'required',
            'device_rack_id' => 'required',
            'device_status' => 'required',
            'device_describtion' => 'required',
        ]);
    
        if ($request->hasFile('device_image')) {
            $file = $request->file('device_image');
            $path = time() . '_' . $data['device_name'] . '.' . $file->getClientOriginalExtension();
            Storage::disk('local')->put('public/images/' . $path, file_get_contents($file));
            $data['device_image'] = $path;
        }
    
        $device->update($data);
    
        return redirect('/device')->with('success', 'Asset update successfully.');
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

    //export data

    public function exportDeviceData()
    {
        $fileName = 'devices.xlsx';
    
        // Ambil semua ID perangkat dari database
        $devices = device::pluck('id')->toArray();
    
        $export = new ExportsDevice($devices);
    
        foreach ($devices as $index => $deviceId) {
            $device = device::find($deviceId);
    
            if ($device) {
                $drawing = new Drawing();
                $drawing->setPath(public_path('/storage/images/qrcodes/' . $device->device_name . '.png'));
                $drawing->setHeight(90);

                // Tentukan posisi kolom untuk gambar qrcode
                $column = 'L';
                $row = $index + 6; // Baris 6, 7, 8, dst.
                $coordinate = $column . $row;
                $drawing->setCoordinates($coordinate);
    
                $export->addDrawing($drawing);
            }
        }
    
        return Excel::download($export, $fileName);
    }
}
