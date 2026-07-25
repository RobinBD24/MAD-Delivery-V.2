<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GPSController extends Controller
{
    // Rider GPS tracking stub
    public function updateLocation(Request $request)
    {
        // Expect: lat, lng, rider_id
        // Update rider current_location
        return response()->json(['status' => 'updated']);
    }

    public function track($riderId)
    {
        // Return live rider location
        return response()->json(['rider_id' => $riderId, 'location' => null]);
    }
}
