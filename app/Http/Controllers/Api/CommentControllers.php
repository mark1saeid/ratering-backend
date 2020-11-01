<?php

namespace App\Http\Controllers\Api;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Post;
use App\Traits\GeneralTrait;
use App\User;
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
        $id = auth()->user()->id;
        $validator = Validator::make($request->all(), [
            'comment_text' => 'string',
            'post_rate' => 'required|numeric|min:1|max:5',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $rater5sum = Comment::all()->where("post_id" , $pid)->where("post_rate" , '5')->count();
        $rater4sum = Comment::all()->where("post_id" , $pid)->where("post_rate" , '4')->count();
        $rater3sum = Comment::all()->where("post_id" , $pid)->where("post_rate" , '3')->count();
        $rater2sum =Comment::all()->where("post_id" , $pid)->where("post_rate" , '2')->count() ;
        $rater1sum = Comment::all()->where("post_id" , $pid)->where("post_rate" , '1')->count();
        $counter = Comment::all()->where("post_id" , $pid)->count();
        $sublogic = (5*$rater5sum) + (4*$rater4sum) + (3*$rater3sum)+ (2*$rater2sum)+ (1*$rater1sum);
        $logic = $sublogic/($counter+1);
        $s =  Post::all()->where('id' ,$pid )->first();
        if ($s){
            $s->update(['post_rating'=> $logic
            ]);
        }
        if ($counter ==0){
            $s->update(['post_rating'=> $request->post_rate
            ]);
        }









        $post_comment = Comment::create(array_merge(
            $validator->validated(),
            [
                'publisher_id'=>$id,
                'post_id'=>$pid,
                'post_rate' => $request->post_rate
            ]
        ));

        $post_id = Post::all()->where('id',$pid )->first();
        $post_publisher_id = $post_id->publisher_id;
        $post_publisher = User::all()->where('id' ,$post_publisher_id)->first();
        $current_point = $post_publisher->point;


        if ($post_publisher){
            $post_publisher->update(['point'=> ($current_point+$request->post_rate)]);
        }



        return response()->json([
            'message' => 'posted successfully ',
            'comment' => $post_comment
        ], 201);
    }
}
