<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\device;
use App\Models\rack;
use App\Models\site;
use App\Models\location;

class HomeController extends Controller
{
    public function index()
    {
        $deviceCount = Device::count();
        $rackCount  = rack::count();
        $siteCount  = site::count();
        $locationCount  = location::count();
        // return redirect()->route('dashboard')->with('deviceCount', $deviceCount);
        return view('dashboard', compact('deviceCount','rackCount','siteCount','locationCount'));
    }
}