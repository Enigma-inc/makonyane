<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $fillable = [
        'subject', 'email', 'message', 'user_id'
    ];

    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
