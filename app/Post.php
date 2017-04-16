<?php

namespace English;

use Illuminate\Database\Eloquent\Model;

/**
 * @author Salim Djerbouh
 * @version v0.1.1
 */

class Post extends Model {

    public function user() {

      return $this->belongsTo('English\User');

    }

    public function likes() {
      return $this->hasMany('English\Like');
    }
}
