<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use App\Traits\GeneralTrait;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Postcontrollers extends Controller
{
    use GeneralTrait;
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    function all(){
        $post = Post::all()->sortByDesc('created_date');
        return $post;
    }
    function pall($pid){
        $post = Post::all()->where('publisher_id', '=', $pid);
        return $post;
    }
    function find($pid,$id){
        $post = Post::all()->where('publisher_id', '=', $pid) -> find($id);
        return $post;
    }
    function create(Request $request){
        $validator = Validator::make($request->all(), [
         //   'publisher_id' => 'required|string',
            'post_text' => 'required|string',
            'post_link' => 'required|string',
            'publisher_username' => 'required|string',


        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $id = auth()->user()->id;
        $post = Post::create(array_merge(
            $validator->validated(),
            ['post_rating' => '0'
            ,'publisher_id'=>$id]
        ));

        return response()->json([
            'message' => 'posted successfully ',
            'post' => $post
        ], 201);
    }
}
