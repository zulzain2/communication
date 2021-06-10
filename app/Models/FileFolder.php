<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class FileFolder extends Model
{
    use Notifiable;
    protected $table = 'folder';
    public $incrementing = FALSE;
}
