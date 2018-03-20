<?php

namespace English;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'status_id', 'body'];

    public function ownerName()
    {
        return $this->owner->username;
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
