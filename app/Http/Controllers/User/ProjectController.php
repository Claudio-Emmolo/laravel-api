<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projectList = Project::orderBy('date', 'desc')->paginate(9);

        return view('user.project.index', compact('projectList'));
    }

    public function show(Project $project)
    {
        return view('user.project.show', compact('project'));
    }
}
