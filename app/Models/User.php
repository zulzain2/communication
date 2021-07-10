<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userdevices()
    {
        return $this->hasMany('App\Models\UserDevice', 'id_user', 'id');
    }

    public static function getUserName($id){
        if ($id != null) {
            $user = User::find($id);
			if($user)
				return $user->name;
			else{
                if($id == "SafeUHub")
                {
                    return $id;
                }
                else
                {
                    return "Not Found";
                }
            }

        } else {

            return "Not Found";
        }
    }
}
