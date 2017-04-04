<?php

namespace English\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @author Salim Djerbouh
 * @version 0.1
 */
class Status extends Model{
  protected $table = 'statuses';

  protected $fillable = [
    'body'
  ];

  public function user()
  {
    return $this->belongsTo('English\Model\User', 'user_id');
  }
}
