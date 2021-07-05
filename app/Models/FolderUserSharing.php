<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class FolderUserSharing extends Model
{
    use Notifiable;
    protected $table = 'folder_user_sharing';
    public $incrementing = FALSE;

    public function user_to()
    {
        return $this->belongsTo('App\Models\User', 'id_users_to', 'id');
    }
}
