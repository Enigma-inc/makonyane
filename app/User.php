<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 
    ];

    protected  $guarded =[];
    protected $appends=['send_count','queue_count'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

     public function emails()
   {
       return $this->hasMany(Email::class);
   }

    public function getSendCountAttribute()
    {
        return $this->emails->where('is_send','=',true)->count();
    }
    public function getQueueCountAttribute()
    {
        return $this->emails->where('is_send','=',false)->count();
    }
}
