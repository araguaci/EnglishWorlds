<?php

namespace English\Http\Controllers;

use English\Post;
use Illuminate\Http\Request;

/**
 * @author Salim Djerbouh <tbitw31@gmail.com>
 * @version v0.1.1
 */

class PostController extends Controller {

  public function postCreatePost(Request $request) {

    // Validation
    $post = new Post();
    $post->body = $request['body'];
    $request->user()->posts()->save($post);
    return redirect()->route('dashboard');

  }
}
