<?php

namespace App\Http\Controllers\Api;

use App\Connection;
use App\Http\Controllers\Controller;
use App\Post;
use App\Status;
use App\Traits\GeneralTrait;
use App\User;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StatusControllers extends Controller
{
    use GeneralTrait;
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            Status::where('created_at', '<', Carbon::now()->subDays(1))->delete();
        })->daily();
    }

    function rate(Request $request,$sid){
        $validator = Validator::make($request->all(), [
            'status_rating' => 'required|numeric|min:1|max:5',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $id = auth()->user()->id;

        $is = Status::all()->where('publisher_id',$id)->where('status_id',$sid)->first();
if (!$is) {
    $status_id = Status::all()->where('id', $sid)->first();
    $status_publisher_id = $status_id->publisher_id;
    $status_publisher = User::all()->where('id', $status_publisher_id)->first();
    $current_point = $status_publisher->point;

    if ($status_publisher) {
        $status_publisher->update(['point' => ($current_point + $request->status_rating)]);
    }
    $cpoint = $status_id->status_rating;

    $status = Status::all()->find($sid);
    $status->update(['status_rating' => (($request->status_rating) + $cpoint)
    ]);
    return response()->json([
        'message' => 'Rated successfully ',
    ], 201);
}else{
    return response()->json([
        'message' => 'done',
    ], 401);
}
    }

    function all(){
        $id = auth()->user()->id;
        $event = Connection::where("to_id" , $id)->orWhere('from_id' , $id)->get();
        $event = $event->where('status' , 'true');

        $status = Status::all()->sortByDesc('created_date')->where($event);
        return $status;
    }
    function pstatus($pid){
        $status = Status::all()->where('publisher_id', '=', $pid)->sortByDesc('created_date');
        return $status;
    }
    function find($pid,$id){
        $status = Status::all()->where('publisher_id', '=', $pid) -> find($id);
        return $status;
    }
    function create(Request $request)
    {
        $id = auth()->user()->id;
        $validator = Validator::make($request->all(), [
            'status_text' => 'string',
            'status_image' => 'mimes:jpeg,jpg,png,gif|max:10000|unique:status',
            'status_video' => 'mimes:mp4,mov,ogg,qt |max:20000|unique:status',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }


        $image_file = $request->file('status_image');
        if ($image_file) {
            if (!$image_file->isValid()) {
                return response()->json(['invalid_file_upload'], 400);
            }
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $pin = mt_rand(1000000, 9999999)
                . mt_rand(1000000, 9999999)
                . $characters[rand(0, strlen($characters) - 1)];
            $random = str_shuffle($pin);

            $image_name = $request->file('status_image')->getClientOriginalName();

            $image_paths = $request->file('status_image')->move(public_path('/status/image/'), $random . $image_name);
            $image_url = url('/status/image/' . $random . $image_name);
        } else {
            $image_url = null;
        }


        $video_file = $request->file('status_video');
        if ($video_file) {
            if (!$video_file->isValid()) {
                return response()->json(['invalid_file_upload'], 400);
            }
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $pin = mt_rand(1000000, 9999999)
                . mt_rand(1000000, 9999999)
                . $characters[rand(0, strlen($characters) - 1)];
            $random = str_shuffle($pin);

            $video_name = $request->status_video->getClientOriginalName();

            $video_path = $request->file('status_video')->move(public_path('/status/video/'), $random . $video_name);
            $video_url = url('/status/video/' . $random . $video_name);
        } else {
            $video_url = null;
        }


        $status = Status::create(array_merge(
            $validator->validated(),
            ['status_rating' => '0',
                'publisher_id' => $id,
                'status_image' => $image_url,
                'status_text' => $request->status_text,
                'status_video' => $video_url
            ]
        ));

        return response()->json([
            'message' => 'posted successfully ',
            'status' => $status
        ], 201);


    }

    function remove($sid){
        $id = auth()->user()->id;
        $is = Status::where('publisher_id',$id)->where('id',$sid);
        if ($is){
            $is->delete();
            return response()->json([
                'message' => 'deleted successfully ',
            ], 201);
        }
        else{
            return response()->json([
                'message' => 'Not Found',
            ], 404);
        }
    }

}
