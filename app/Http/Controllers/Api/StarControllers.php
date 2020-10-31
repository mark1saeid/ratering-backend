<?php

namespace App\Http\Controllers\Api;

use App\Connection;
use App\Http\Controllers\Controller;
use App\Star;
use App\Traits\GeneralTrait;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StarControllers extends Controller
{
    use GeneralTrait;
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    function all($pid){
        $event = Star::where("to_id" , $pid)->orWhere('from_id' , $pid)->get();
        return $event;
    }

    function sent($pid){
        $post = Star::all()->where('from_id', '=', $pid) ;
        return $post;
    }
    function received($pid){
        $post = Star::all()->where('to_id', '=', $pid) ;
        return $post;
    }
    function add(Request $request){
        $validator = Validator::make($request->all(), [
            'to_id' => 'required|string|max:1',
            'rate' => 'required|numeric|min:2|max:5',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $id = auth()->user()->id;
        $post = Star::create(array_merge(
            $validator->validated(),
            [
                'from_id' => $id,
            ]
        ));


        $to_id = $request->get('to_id');


$rater5sum = Star::all()->where("to_id" , $to_id)->where("rate" , '5')->count();
$rater4sum = Star::all()->where("to_id" , $to_id)->where("rate" , '4')->count();
$rater3sum = Star::all()->where("to_id" , $to_id)->where("rate" , '3')->count();
$rater2sum =Star::all()->where("to_id" , $to_id)->where("rate" , '2')->count() ;
$rater1sum = Star::all()->where("to_id" , $to_id)->where("rate" , '1')->count();

$counter = Star::all()->where("to_id" , $to_id)->count();

$sublogic = (5*$rater5sum) + (4*$rater4sum) + (3*$rater3sum)+ (2*$rater2sum)+ (1*$rater1sum);

if ($counter!= 0){
    $logic = $sublogic/$counter;
    $s =  User::all()->where('id' ,$request->get('to_id') )->first();
    if ($s){
        $s->update(['rating'=> $logic]);
        return response()->json([
            'message' => 'Done Successfully ',
        ], 201);
    }
    else{
        return response()->json([
            'message' => 'Not Found',
        ], 404);
    }
}
else{
    $s =  User::all()->where('id' ,$request->get('to_id') )->first();
    if ($s){
        $s->update(['rating'=> $request->rate]);
        return response()->json([
            'message' => 'Done Successfully ',
        ], 201);
    }
    else{
        return response()->json([
            'message' => 'Not Found',
        ], 404);
    }
}





    }





}
