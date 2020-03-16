<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
    public function index(){

    	$projects = Project::all();
    	return view('projects.index', compact('projects'));
    }

    public function show(Project $project){

    	$project = Project::find($project->id);
    	return view('projects.show', compact('project'));
    }
}
