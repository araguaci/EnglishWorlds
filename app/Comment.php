<?php

namespace English;

use Illuminate\Database\Eloquent\Model;
use Cog\Laravel\Love\Reactable\Models\Traits\Reactable;
use Cog\Contracts\Love\Reactable\Models\Reactable as ReactableContract;

class Comment extends Model implements ReactableContract
{
    use Reactable;

    protected $appends = ['ownerName', 'longAgo'];

    protected $fillable = ['user_id', 'status_id', 'body'];

    public function getOwnerNameAttribute()
    {
        return $this->owner->username;
    }

    public function getLongAgoAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
