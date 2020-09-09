<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Comment extends Model
{
    use Notifiable;
    protected $table ='comments';
    protected $fillable = [
        'id', 'publisher_id', 'comment_text',
        'post_id',
    ];
}
