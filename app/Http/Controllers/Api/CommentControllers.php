<?php

namespace App\Http\Controllers\Api;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentControllers extends Controller
{
    use GeneralTrait;
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    function all($id){
        $post = Comment::all()->sortByDesc('created_date')->where('post_id',$id);
        return $post;
    }
    function find($id,$cid){
        $post = Comment::all()->where('post_id', '=', $id) -> find($cid);
        return $post;
    }
    function create(Request $request,$pid){
        $validator = Validator::make($request->all(), [
            'comment_text' => 'required|string',

        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $id = auth()->user()->id;
        $post = Comment::create(array_merge(
            $validator->validated(),
            ['publisher_id'=>$id,
            'post_id'=>$pid]
        ));

        return response()->json([
            'message' => 'posted successfully ',
            'comment' => $post
        ], 201);
    }
}
