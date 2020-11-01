<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Report;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReportControllers extends Controller
{
    use GeneralTrait;
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
    function create(Request $request){
        $id = auth()->user()->id;

        $validator = Validator::make($request->all(), [
            'post_id' => 'string',
            'profile_id' => 'string',
            'status_id' => 'string',
            'about' => 'required|string',
            'screen_shot' => 'mimes:jpeg,jpg,png,gif|max:10000|unique:posts',
            'reason' => 'required|string',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }




        $screen_shot_file = $request->file('screen_shot');
        if ($screen_shot_file){
            if(!$screen_shot_file->isValid()) {
                return response()->json(['invalid_file_upload'], 400);
            }
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $pin = mt_rand(1000000, 9999999)
                . mt_rand(1000000, 9999999)
                . $characters[rand(0, strlen($characters) - 1)];
            $random = str_shuffle($pin);

            $screen_shot_name = $request->file('screen_shot')->getClientOriginalName();

            $image_paths =$request->file('screen_shot')->move(public_path('/report/image/'),$random.$screen_shot_name);
            $image_url = url('/report/image/'.$random.$screen_shot_name);
        }else{
            $image_url = null;
        }




        $report = Report::create(array_merge(
            $validator->validated(),
            [
                'publisher_id'=> $id,
                'post_id' => $request->post_id ,
                'profile_id' => $request->profile_id ,
                'status_id' => $request->status_id,
                'screen_shot' => $image_url,
                'about' => $request->about,
                'reason' => $request->reason,
                'status' => 'pending'
            ]
        ));

        return response()->json([
            'message' => 'posted successfully ',
            'report' => $report
        ], 201);
    }
}
