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

    $this->validate($request, [
      'body' => 'required|max:1000'
    ]);
    $post = new Post();
    $post->body = $request['body'];
    $message = 'There was an error';
    if ($request->user()->posts()->save($post)) {
      $message = 'Post successfully created';
    }
    return redirect()->route('dashboard')->with(['message' => $message]);

  }
}
