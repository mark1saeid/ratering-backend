<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;

class Connection extends Model
{
    use Notifiable;
    protected $table ='connection';
    protected $fillable = [
        'from_id', 'to_id', 'status',  'created_at','updated_at',
    ];
    public function getCreatedAtAttribute($attr) {
        return Carbon::parse($attr)->format('M D, Y h:m A'); //Change the format to whichever you desire
    }

    public function getUpdatedAtAttribute($attr)
    {
        return Carbon::parse($attr)->format('M D, Y h:m A'); //Change the format to whichever you desire
    }
}
