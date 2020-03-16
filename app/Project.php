<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Task;
use App\Events\TaskAdded;

class Project extends Model
{
	protected $guarded = [];

	public $with = ['tasks'];

    public function tasks(){
    	return $this->hasMany(Task::class);
    }

    public function addTask($attributes){

    	$task = $this->tasks()->create($attributes);

    	TaskAdded::dispatch($task);
    }
}
