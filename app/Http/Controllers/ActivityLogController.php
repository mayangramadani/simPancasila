<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityLogController extends Controller
{
    public function index()
    {
        $aktivitas = ActivityLog::get();
        return view('activitylog.index', compact('aktivitas'));
    }
}
