<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class MeetingLog extends Model
{
    
    use Notifiable;
    protected $table = 'meeting_logs';
    public $incrementing = FALSE;

    public function scheduler()
    {
        return $this->hasOne('App\Models\Scheduler', 'id', 'id_module');
    }
}
