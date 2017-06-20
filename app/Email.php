<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $fillable = [
        'subject', 'email', 'message',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
