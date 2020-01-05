<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WorkController extends Controller
{

    public function index()
    {
        $projects = Project::all();
        return Inertia::render('Work/Index', compact('projects'));
    }

}
