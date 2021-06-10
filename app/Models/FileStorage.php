<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class FileStorage extends Model
{
    use Notifiable;
    protected $table = 'file_storage';
    public $incrementing = FALSE;
}
