<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
class TaskController extends Controller
{

    //

    function store(Request $request){
        $newTask = Task::create($request->all());
        // Hubungkan task yang baru di create dengan tags
        $newTask->tags()->attach($request->tags);
        return response()->json(["status"=>"ok","message"=>"Succesfully created"]);
    }

    function index(){

       // $tasks = Task::all();
       $tasks = Task::where('user_id',Auth::user()->id)->get();
        return response()->json(["status"=>"ok","data"=>$tasks]);

    }
    function show($id){
        $task = Task::with('tags')->find($id);
        return response()->json(["status"=>"ok","data"=>$task]);
    }

    function update(Request $request, $id){
        $task = Task::find($id);
        $task->update($request->all());
        return response()->json(["status"=>"ok","data"=>$task]); 
    }

    function delete($id){
        $task = Task::find($id);
        $task->delete();
        return response()->json(["status"=>"ok","message"=>"Successfully deleted"]);
    }
}
