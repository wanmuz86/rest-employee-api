<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    //

    function create(Request $request){
        Tag::create($request->all());
        return response()->json(["status"=>"ok","message"=>"Tag succesfully added"]);
    }

    function index(){
        $tags = Tag::all();
        return response()->json(["status"=>"ok", "data"=>$tags]);
    }

    function show($id){
        $tag = Tag::find($id);
        // User::where('gender','p')->get();
        // User::where('gender','l')->where('location_id',1)->get();
        // User::where('location_id',1)->orWhere('location_id',2)->get();
        
        return response()->json(["status"=>"ok","data"=>$tag]);
    }

}
