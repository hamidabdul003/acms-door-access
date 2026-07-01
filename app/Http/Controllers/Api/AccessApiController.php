<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\CardPermission;
use App\Models\Device;
use Illuminate\Http\Request;

class AccessApiController extends Controller
{
    public function check(Request $request)
    {
        $request->validate([
            'device_uuid' => 'required',
            'api_key'     => 'required',
            'uid'         => 'required',
        ]);

        $device = Device::where('uuid', $request->device_uuid)
            ->where('api_key', $request->api_key)
            ->first();

        if (!$device) {

            return response()->json([
                'success' => false,
                'message' => 'Device tidak dikenal'
            ], 401);

        }
        $card = Card::where('uid', strtoupper($request->uid))
            ->first();

        if (!$card) {

            return response()->json([
                'success' => false,
                'message' => 'Kartu tidak terdaftar'
            ]);

        }

        if (!$card->status) {

            return response()->json([
                'success' => false,
                'message' => 'Kartu nonaktif'
            ]);

        }
        $permission = CardPermission::where('card_id', $card->id)
            ->where('device_id', $device->id)
            ->exists();

        if (!$permission) {

            return response()->json([
                'success' => false,
                'message' => 'Akses ditolak'
            ]);

        }
        return response()->json([

            'success' => true,

            'message' => 'Access Granted',

            'relay_time' => $device->relay_time,

            'owner' => $card->owner_name,

        ]);

    }
}

