<?php

namespace App\Http\Controllers\Api;

use App\Connection;

use App\Http\Controllers\Controller;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ConnectionControllers extends Controller
{
    use GeneralTrait;
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    function all($pid){
        $event = Connection::where("to_id" , $pid)->orWhere('from_id' , $pid)->get();
        $event = $event->where('status' , 'true');
        return $event;
    }

    function sent($pid){
        $post = Connection::all()->where('from_id', '=', $pid) ;
        return $post;
    }
    function received($pid){
        $post = Connection::all()->where('to_id', '=', $pid) ;
        return $post;
    }
    function add(Request $request){
        $validator = Validator::make($request->all(), [
            'to_id' => 'required|string',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $id = auth()->user()->id;
        $post = Connection::create(array_merge(
            $validator->validated(),
            [
                'from_id' => $id,
                 'status' => 'pending'
            ]
        ));

        return response()->json([
            'message' => 'Connection Sent successfully ',
            'Connection' => $post
        ], 201);
    }



    function status(Request $request,$cid){
        $validator = Validator::make($request->all(), [
            'status' => 'required|string',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $id = auth()->user()->id;
        $status = $request->get('status');

      $s = Connection::all()->where('id' ,$cid )->where('to_id',$id)->first();


       if ($s){
           $s->update(['status'=> $status]);
           return response()->json([
               'message' => 'Done Successfully ',
               'status' => $status
           ], 201);
       }
       else{
           return response()->json([
               'message' => 'Not Found',

           ], 404);
       }
       }

    function remove($cid){


        $id = auth()->user()->id;


       // $s = Connection::all()->where('id' ,$cid )->where('to_id',$id)->first();

        $event = Connection::where("to_id" , $cid)->where('from_id' , $id)->get();
        $event = $event->where('status' , 'true');

        if ($event){
            $event->update(['status'=> "false"]);
            return response()->json([
                'message' => 'Done Successfully ',
                'status' => 'false'
            ], 201);
        }
        else{
            return response()->json([
                'message' => 'Not Found',

            ], 404);
        }
    }

}
