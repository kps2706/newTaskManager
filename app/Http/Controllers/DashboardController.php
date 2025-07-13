<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Issue;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //Dashboard
    public function index(){


         return view('layouts.dashboard.admin', [
            'totalUsers'      => User::count(),
            'totalModules'    => Module::count(),
            'totalIncidents'  => Issue::count(),
            'resolvedCount'   => Issue::where('status', 'resolved')->count(),
            'pendingCount'    => Issue::where('status', '!=', 'resolved')->count(),
            'overdueCount'    => Issue::where('sla_due_date', '<', now())->where('status', '!=', 'resolved')->count(),
            'recentIncidents' => Issue::latest()->take(5)->get(),


        ]);

    }

}
