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


    function trend(){
        $post = Post::all()->sortByDesc('created_date')->where('post_rating','>',3);
        return $post;
    }
    function videos(){
    $post = Post::all()->sortByDesc('created_date')->where('post_video','!=',null);
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
        $id = auth()->user()->id;
        $username = auth()->user()->username;

        $validator = Validator::make($request->all(), [
            'post_text' => 'string',
            'post_link' => 'string|unique:posts',
            'post_image' => 'mimes:jpeg,jpg,png,gif|max:10000|unique:posts',
            'post_video'  => 'mimes:mp4,mov,ogg,qt |max:20000|unique:posts',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }




        $image_file = $request->file('post_image');
        if ($image_file){
            if(!$image_file->isValid()) {
                return response()->json(['invalid_file_upload'], 400);
            }
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $pin = mt_rand(1000000, 9999999)
                . mt_rand(1000000, 9999999)
                . $characters[rand(0, strlen($characters) - 1)];
            $random = str_shuffle($pin);

            $image_name = $request->file('post_image')->getClientOriginalName();

            $image_paths =$request->file('post_image')->move(public_path('/post/image/'),$random.$image_name);
            $image_url = url('/post/image/'.$random.$image_name);
        }else{
            $image_url = null;
        }





        $video_file = $request->file('post_video');
        if ($video_file){
            if(!$video_file->isValid()) {
                return response()->json(['invalid_file_upload'], 400);
            }
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $pin = mt_rand(1000000, 9999999)
                . mt_rand(1000000, 9999999)
                . $characters[rand(0, strlen($characters) - 1)];
            $random = str_shuffle($pin);

            $video_name = $request->post_video->getClientOriginalName();

            $video_path =$request->file('post_video')->move(public_path('/post/video/'),$random.$video_name);
            $video_url = url('/post/video/'.$random.$video_name);
        }else{
            $video_url = null;
        }







        $post = Post::create(array_merge(
            $validator->validated(),
            [   'post_rating' => '0',
                'publisher_id'=> $id,
                'post_link' => $request->post_link ,
                'post_image' => $image_url ,
                'post_text' => $request->post_text,
                'post_video' => $video_url


            ]
        ));

        return response()->json([
            'message' => 'posted successfully ',
            'post' => $post
        ], 201);
    }





}
