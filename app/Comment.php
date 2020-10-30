<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;

class Comment extends Model
{
    use Notifiable;
    protected $table ='comments';
    protected $fillable = [
        'id', 'publisher_id', 'comment_text',
        'post_id','post_rate',  'created_at','updated_at',
    ];
    public function getCreatedAtAttribute($attr) {
        return Carbon::parse($attr)->format('M D, Y h:mm A'); //Change the format to whichever you desire
    }

    public function getUpdatedAtAttribute($attr)
    {
        return Carbon::parse($attr)->format('M D, Y h:mm A'); //Change the format to whichever you desire
    }
}
