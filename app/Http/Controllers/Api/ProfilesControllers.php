<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class ProfilesControllers extends Controller
{
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
           'created_at' => $p->created_at,
           'updated_at' => $p->updated_at,

        ], 200);
    }
}
