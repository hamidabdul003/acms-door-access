<?php

namespace App\Http\Controllers;

use App\Models\AccessLog;
use App\Models\Card;
use App\Models\Device;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'totalCards' => Card::count(),
            'totalDevices' => Device::count(),
            'todayAccess' => AccessLog::whereDate('created_at', today())->count(),
            'unknownCards' => AccessLog::whereNull('card_id')->count(),
            'recentLogs' => AccessLog::latest()->take(10)->get(),
        ]);
    }
}
