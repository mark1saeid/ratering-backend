<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Status extends Model
{
    use Notifiable;
    protected $table ='status';
    protected $fillable = [
        'id', 'publisher_id', 'status_text',
        'status_rating', 'status_link',
        'status_image', 'status_video',  'created_at','updated_at',
    ];
    public function getCreatedAtAttribute($attr) {
        return Carbon::parse($attr)->format('M D, Y h:m A'); //Change the format to whichever you desire
    }

    public function getUpdatedAtAttribute($attr)
    {
        return Carbon::parse($attr)->format('M D, Y h:m A'); //Change the format to whichever you desire
    }

}
