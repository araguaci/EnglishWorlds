<?php

namespace English\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['body'];
    public function status()
    {
      return $this->belongsTo(Status::class);
    }

    public function user()
    {
      return $this->belongsTo(User::class, 'user_id');
    }

    public function replies()
    {
      return $this->hasMany(Reply::class);
    }
}
