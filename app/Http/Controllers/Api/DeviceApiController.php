<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Device;
use Illuminate\Http\Request;

class DeviceApiController extends Controller
{
    public function heartbeat(Request $request)
    {
        $request->validate([

            'uuid'=>'required',

            'api_key'=>'required',

            'firmware'=>'nullable',

            'ip_address'=>'nullable',

            'wifi_rssi'=>'nullable',

            'heap'=>'nullable',

            'uptime'=>'nullable',

            'mac_address'=>'nullable',

        ]);

        $device = Device::where(

            'uuid',

            $request->uuid

        )->first();

        if(!$device){

            return response()->json([

                'status'=>'error',

                'message'=>'Device not found'

            ],404);

        }

        if($device->api_key != $request->api_key){

            return response()->json([

                'status'=>'error',

                'message'=>'Invalid API Key'

            ],401);

        }

        $device->update([

            'firmware'=>$request->firmware,

            'ip_address'=>$request->ip_address,

            'wifi_rssi'=>$request->wifi_rssi,

            'heap'=>$request->heap,

            'uptime'=>$request->uptime,

            'mac_address'=>$request->mac_address,

            'last_seen'=>now(),

            'status'=>1,

        ]);

        return response()->json([

            'status'=>'ok',

            'server_time'=>now(),

        ]);

    }

}
