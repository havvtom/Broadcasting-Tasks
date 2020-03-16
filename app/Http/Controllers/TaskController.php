<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class TaskController extends Controller
{
	public function index(Project $project){

		return $tasks = $project->tasks()->pluck('description');
	}

    public function store(Project $project, Request $request){

    	$attributes = $request->validate([
    		'description' => 'required|min:6'
    	]);

    	$project->addTask($attributes);
    }
}
