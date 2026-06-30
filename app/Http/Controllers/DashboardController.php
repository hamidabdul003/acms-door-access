<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\AccessLog;
use App\Models\Device;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'totalCards' => Card::count(),
            'todayAccess' => AccessLog::whereDate('created_at', today())->count(),
            'onlineDevice' => Device::where('status', true)->count(),
            'recentLogs' => AccessLog::latest()->take(10)->get(),
        ]);
    }
}
