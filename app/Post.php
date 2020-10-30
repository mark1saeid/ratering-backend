<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;

class Post extends Model
{
    use Notifiable;
protected $table ='posts';
    protected $fillable = [
        'id', 'publisher_id', 'post_text',
        'post_rating', 'post_link',
        'post_image', 'post_video',  'created_at','updated_at',
    ];
    public function getCreatedAtAttribute($attr) {
        return Carbon::parse($attr)->format('M D, Y h:mm A'); //Change the format to whichever you desire
    }

    public function getUpdatedAtAttribute($attr)
    {
        return Carbon::parse($attr)->format('M D, Y h:mm A'); //Change the format to whichever you desire
    }

}
