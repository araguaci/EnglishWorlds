<?php

namespace English;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function statuses()
    {
        return $this->belongsToMany(Status::class);
    }
}
