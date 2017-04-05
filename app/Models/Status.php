<?php

namespace English\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @author Salim Djerbouh
 * @version 0.1
 */
class Status extends Model {
  protected $table = 'statuses';

  protected $fillable = [
    'body'
  ];

  public function user() {
    return $this->belongsTo('English\Models\User', 'user_id');
  }

  public function scopeNotReply($query) {
    return $query->whereNull('parent_id');
  }

  public function replies() {
    return $this->hasMany('English\Models\Status', 'parent_id');
  }

  public function likes() {
    return $this->morphyMany('English\Models\Like', 'likeable');
  }
}
