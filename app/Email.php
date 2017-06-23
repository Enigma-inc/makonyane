<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $fillable = [
        'subject', 'email', 'message', 'user_id', 'doc_path'
    ];

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function getfullDocPathAttribute(){
           return url('/email-docs/'.$this->doc_path);
    }
}
