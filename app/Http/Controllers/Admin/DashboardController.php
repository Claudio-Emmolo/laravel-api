<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $projectCount = Project::all()->count();
        $trashCount = Project::onlyTrashed()->count();
        $lastProject = Project::all()->last();

        return view('admin.dashboard', compact('projectCount', 'trashCount', 'lastProject'));
    }
}