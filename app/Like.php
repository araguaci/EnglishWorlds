<?php

namespace English;

use Illuminate\Database\Eloquent\Model;

/**
 *
 */

class Like extends Model {

  public function user()
  {
    return $this->belongsTo('English\User');
  }

  public function post()
  {
    return $this->belongsTo('English\Post');
  }
}
