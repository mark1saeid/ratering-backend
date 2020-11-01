<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Carbon\Carbon;

class InteractionControllers extends Controller
{
    function add_views($pid){
        $interaction = Post::all()->where('id' ,$pid)->first();
        $interaction->increment('views',1);
        $interaction->increment('impression_24',1);
        return response()->json([
            'message' => 'added successfully ',
        ], 201);
    }
    function get_views($pid){
        $interaction = Post::all()->where('id' ,$pid)->first();
        $views = $interaction->views;

        return response()->json([
            'views' => $views
        ], 201);

    }
    function get_impression($pid){
        $interaction = Post::all()->where('id' ,$pid)->first();
        $impression = $interaction->impression;
        return response()->json([
            'impression' => $impression
        ], 201);
    }
    function not_interested($pid){
        $interaction = Post::all()->where('id' ,$pid)->first();
        $interaction->decrement('impression',2);
        $interaction->decrement('impression_24',2);
        return response()->json([
            'message' => 'done'
        ], 201);
    }
    function test(){
        $post_24_impression = Post::where('created_at', '<', Carbon::now()->subDays(1));
        $post_24_impression->update(array('impression_24' => 1));
        return response()->json([
            'message' => 'done'
        ], 201);
    }
}
