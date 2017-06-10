<?php

namespace English\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
  public function scopeNotReply($query)
  {
      return $query->whereNull('parent_id');
  }
}
