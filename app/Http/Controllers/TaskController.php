<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
class TaskController extends Controller
{
    //

    function store(Request $request){
        Task::create($request->all());
        return response()->json(["status"=>"ok","message"=>"Succesfully created"]);
    }

    function index(){
        $tasks = Task::all();
        return response()->json(["status"=>"ok","data"=>$tasks]);

    }
    function show($id){
        $task = Task::find($id);
        return response()->json(["status"=>"ok","data"=>$task]);
    }
}
