<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Connection extends Model
{
    use Notifiable;
    protected $table ='connection';
    protected $fillable = [
        'from_id', 'to_id', 'status',
    ];
}
