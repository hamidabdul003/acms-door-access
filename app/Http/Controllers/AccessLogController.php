<?php

namespace App\Http\Controllers;

class AccessLogController extends Controller
{
    public function index()
    {
        return view('logs.index');
    }
}
