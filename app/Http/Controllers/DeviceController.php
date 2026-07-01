<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    /**
     * Display Device List
     */
    public function index()
    {
        $devices = Device::orderBy('device_name')->get();

        return view('devices.index', compact('devices'));
    }

    /**
     * Show Create Form
     */
    public function create()
    {
        return view('devices.create');
    }

    /**
     * Save Device
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'device_name' => 'required|max:100',
            'location'    => 'required|max:100',
            'relay_time'  => 'required|integer|min:1|max:30',
            'description' => 'nullable|max:500',
        ]);

        Device::create($validated);

        return redirect()
            ->route('devices.index')
            ->with('success', 'Device berhasil ditambahkan.');
    }
    /**
     * Show Edit Form
     */
    public function edit(Device $device)
    {
        return view('devices.edit', compact('device'));
    }

    /**
     * Update Device
     */
    public function update(Request $request, Device $device)
    {
        $validated = $request->validate([
            'device_name' => 'required|max:100',
            'location'    => 'required|max:100',
            'relay_time'  => 'required|integer|min:1|max:30',
            'description' => 'nullable|max:500',
        ]);

        $device->update($validated);

        return redirect()
            ->route('devices.index')
            ->with('success', 'Device berhasil diperbarui.');
    }

    /**
     * Delete Device
     */
    public function destroy(Device $device)
    {
        $device->delete();

        return redirect()
            ->route('devices.index')
            ->with('success', 'Device berhasil dihapus.');
    }
    /**
     * Generate API Key Baru
     */

    public function regenerateKey(Device $device)
    {
        $device->update([
            'api_key' => bin2hex(random_bytes(32)),
        ]);

        return redirect()
            ->route('devices.show', $device)
            ->with('success', 'API Key berhasil diperbarui.');
    }
        /**
     * Show Device Detail
     */
    public function show(Device $device)
    {
        return view(
            'devices.show',
            compact('device')
        );
    }
}
