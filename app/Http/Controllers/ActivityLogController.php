<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityLogController extends Controller
{
    public function index()
    {
        $aktivitas = ActivityLog::with('user')->limit(15)->orderBy('id')->get();
        $user = User::select()->count();
        $dataLogin = User::find(Auth::id())->authentications;
        // dd($dataLogin);
        return view('activitylog.index', compact('aktivitas', 'user', 'dataLogin'));
    }
}

