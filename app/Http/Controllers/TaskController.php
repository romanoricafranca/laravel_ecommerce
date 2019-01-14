<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
   	public function showTasks(){
   		$tasks = Task::all();
		return view ('task.tasklist', compact("tasks"));
	}

	public function addTasks(Request $request)
	{
		$task = new Task;
		$task->name = $request->newtask;
		$task->save();

		return redirect("/tasklist");
	}

	public function updateTasks(Request $request, $id)
	{	
		$taskupdate = Task::find($id);
		$taskupdate->name = $request->editedtask;
		$taskupdate->save();

		return redirect('/tasklist');

		// dd($taskupdate);

	}

	public function deleteTasks($id)
	{
		$taskdelete = Task::find($id); //id
		$taskdelete->delete();
		return redirect('/tasklist');

	} 
}
