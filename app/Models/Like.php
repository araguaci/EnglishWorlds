<?php

namespace English\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @author Salim Djerbouh
 * @version 0.1
 */
class ClassName extends AnotherClass {
  protected $table = 'likeable';

  public function likeable() {
    return $this->morphTo();
  }

  public function user() {
    return $this->belongsTo('English\Models\User', 'user_id');
  }
}
