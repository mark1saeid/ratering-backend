<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Post extends Model
{
    use Notifiable;
protected $table ='posts';
    protected $fillable = [
        'id', 'publisher_id', 'post_text',
        'post_rating', 'publisher_id', 'post_link','publisher_username',
    ];


}
