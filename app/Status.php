<?php

namespace English;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = ['body', 'user_id', 'tag_id'];

    public function path()
    {
        return '/'.$this->id;
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function ownerName()
    {
        return $this->owner->username;
    }

    public function addComment($comment)
    {
        $this->comments()->create($comment);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
