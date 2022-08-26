<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityLogController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            // $Aktivitas = \Spatie\Activitylog\Models\Activity::class::all();
        } else {
            // $Aktivitas = \Spatie\Activitylog\Models\Activity::class::where('causer_id', Auth::user()->id)->Get();
        }
        $Aktivitas = ActivityLog::get();
        return view('activitylog.index', compact('Aktivitas'));
    }
}
