<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class AdminLogController extends Controller
{
    public function index()
    {
        // Recupera solo los registros de actividad relacionados con el modelo User
        $logs = Activity::all();
        
        return view('admin.logs.index', compact('logs'));
    }
}
