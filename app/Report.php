<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Report extends Model
{
    use Notifiable;
    protected $table ='report';
    protected $fillable = [
        'id', 'publisher_id', 'post_id',
        'profile_id', 'status_id', 'screen_shot', 'about',
        'reason', 'status',  'created_at','updated_at',
    ];
    public function getCreatedAtAttribute($attr) {
        return Carbon::parse($attr)->format('M D, Y h:m A'); //Change the format to whichever you desire
    }

    public function getUpdatedAtAttribute($attr)
    {
        return Carbon::parse($attr)->format('M D, Y h:m A'); //Change the format to whichever you desire
    }

}
