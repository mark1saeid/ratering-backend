<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionControllers extends Controller
{
    function all($id){
        $event = Transaction::where("to_id" , $id)->orWhere('from_id' , $id)->get();
        return $event;
    }

    function sent($id){
        $event = Transaction::all()->where('from_id', '=', $id) ;
        return $event;
    }
    function received($id){
        $event = Transaction::all()->where('to_id', '=', $id) ;
        return $event;
    }
    function post($pid){
        $event = Transaction::all()->where('post_id', '=', $pid) ;
        return $event;
    }
    function Send(Request $request,$pid){
        $validator = Validator::make($request->all(), [
            'point' => 'required|string',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $id = auth()->user()->id;
        $event = Post::all()->where('id' ,$pid)->first();
        $publisher_id = $event->publisher_id;

        $to_id = User::all()->where('id' ,$publisher_id)->first();
        $from_id = User::all()->where('id' ,$id)->first();


        $from_id->decrement('point',$request->point);
        $to_id->increment('point',$request->point);

        $transaction = Post::create(array_merge(
            $validator->validated(),
            [
                'to_id'=>$publisher_id ,
                'from_id'=>$id ,
                'post_id'=>$pid ,
                'points'=> $request->point
            ]
        ));

        return response()->json([
            'message' => 'done successfully ',
            'transaction' => $transaction
        ], 201);
    }
}
