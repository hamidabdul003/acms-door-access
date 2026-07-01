<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Device;
use Illuminate\Http\Request;

class DeviceApiController extends Controller
{
    /**
     * Heartbeat dari ESP32
     */
    public function heartbeat(Request $request)
    {
        $request->validate([
            'api_key'      => 'required',
            'ip_address'   => 'nullable|ip',
            'mac_address'  => 'nullable|string|max:50',
            'firmware'     => 'nullable|string|max:50',
            'wifi_signal'  => 'nullable|integer',
            'heap_memory'  => 'nullable|integer',
            'temperature'  => 'nullable|numeric',
        ]);

        $device = Device::where('api_key', $request->api_key)->first();

        if (!$device) {

            return response()->json([
                'success' => false,
                'message' => 'Invalid API Key'
            ], 401);

        }
        $device->update([

            'ip_address'  => $request->ip_address,

            'mac_address' => $request->mac_address,

            'firmware'    => $request->firmware,

            'last_seen'   => now(),

        ]);
        return response()->json([

            'success' => true,

            'message' => 'Heartbeat received',

            'server_time' => now()->toDateTimeString(),

            'relay_time' => $device->relay_time,

            'device_uuid' => $device->uuid,

        ]);

    }
}
