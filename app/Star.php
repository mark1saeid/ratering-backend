<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Star extends Model
{
    use Notifiable;
    protected $table ='stars';
    protected $fillable = [
        'id', 'to_id', 'from_id', 'rate',

    ];
}
