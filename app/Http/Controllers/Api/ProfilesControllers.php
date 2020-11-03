<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfilesControllers extends Controller
{
    public function __construct() {
    $this->middleware('auth:api', ['except' => ['login', 'register']]);
}
    function find($id){
        $p = User::all()->find($id);
       return response()->json([
            'id' => $p->id,
           'full_name' => $p->full_name,
           'username' => $p->username,
           'birthday' => $p->birthday,
           'gender' => $p->gender,
           'rating' => $p->rating,
           'email' => $p->email,
           'phone' => $p->phone,
           'point' => $p->point,
           'pp' => $p->pp,
           'bio' => $p->bio,
           'verified' => $p->verified,
           'created_at' => $p->created_at,
           'updated_at' => $p->updated_at,

        ], 200);
    }

    public function uploadpp(Request $request) {
        $id = auth()->user()->id;
        $username = auth()->user()->username;
        $validator = Validator::make($request->all(), [

            'pp' => 'mimes:jpeg,jpg,png,gif|required|max:10000|unique:users'
        ]);

        if($validator->fails()) {
            return response()->json(['msg' => 'upload_file_not_found'], 400);
        }
        $file = $request->file('pp');
        if(!$file->isValid()) {
            return response()->json(['msg' =>'invalid_file_upload'], 400);
        }
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pin = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];
        $random = str_shuffle($pin);

        $image_name = $request->pp->getClientOriginalName();


        $image_paths =$request->file('pp')->move(public_path('/profile/pp/'),$random.$image_name);
        $image_url = url('/profile/pp/'.$random.$image_name);


        $s = User::all()->where('id' ,$id )->first()->update(['pp'=> $image_url]);

        return response()->json(['url' => $image_url],200);
    }

    public function updatebio(Request $request) {

        $validator = Validator::make($request->all(), [
            'bio' => 'required|string|between:4,180',
        ]);

        if($validator->fails()) {
            return response()->json(['Enter Bio From 4 - 180 word'], 400);
        }

        $bios = $request->bio ;

        $id = auth()->user()->id;
        $s = User::all()->where('id' ,$id )->first()->update(['bio'=> $bios]);

        return response()->json(['bio' => $bios],200);
    }

}
