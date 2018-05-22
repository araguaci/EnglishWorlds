<?php

namespace English\Http\Controllers;

use English\Status;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Apply the auth middleware only on the store method
        $this->middleware('auth', ['only' => ['store']]);
    }

    /**
     * Store a new comment.
     *
     * @return redirect back
     */
    public function store(Status $status)
    {
        $this->validate(request(), [
          'body' => 'required',
        ]);

        $status->addComment(([
          'body'      => request('body'),
          'status_id' => $status->id,
          'user_id'   => auth()->id(),
        ]));

        return back();
    }
}
