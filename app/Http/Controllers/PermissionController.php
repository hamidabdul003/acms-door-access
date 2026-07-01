<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Device;
use App\Models\CardPermission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $cards = Card::latest()->get();

        return view(
            'permissions.index',
            compact('cards')
        );
    }

    public function edit(Card $card)
    {
        $devices = Device::orderBy('device_name')->get();

        $selected = CardPermission::where(
            'card_id',
            $card->id
        )
        ->pluck('device_id')
        ->toArray();

        return view(
            'permissions.edit',
            compact(
                'card',
                'devices',
                'selected'
            )
        );
    }

    public function update(
        Request $request,
        Card $card
    )
    {
        CardPermission::where(
            'card_id',
            $card->id
        )->delete();

        if ($request->has('devices')) {

            foreach ($request->devices as $deviceId) {

                CardPermission::create([

                    'card_id'   => $card->id,

                    'device_id' => $deviceId,

                ]);

            }

        }

        return redirect()
            ->route('permissions.index')
            ->with(
                'success',
                'Permission berhasil diperbarui.'
            );
    }

    public function show(Card $card)
    {
        return redirect()->route(
            'permissions.edit',
            $card
        );
    }

    public function create()
    {
        return redirect()->route(
            'permissions.index'
        );
    }

    public function store(Request $request)
    {
        return redirect()->route(
            'permissions.index'
        );
    }

    public function destroy(Card $card)
    {
        CardPermission::where(
            'card_id',
            $card->id
        )->delete();

        return redirect()
            ->route('permissions.index')
            ->with(
                'success',
                'Semua permission berhasil dihapus.'
            );
    }
}
