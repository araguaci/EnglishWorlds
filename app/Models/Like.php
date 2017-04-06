<?php

namespace English\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @author Salim Djerbouh
 * @version 0.1
 */
class Like extends Model {
  protected $table = 'likeable';

  public function likeable() {
    return $this->morphTo();
  }

  public function user() {
    return $this->belongsTo('English\Models\User', 'user_id');
  }
}
