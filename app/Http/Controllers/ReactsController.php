<?php

namespace English\Http\Controllers;

use English\React;
use English\Status;
use English\Http\Requests\LikeStatusRequest;

class ReactsController extends Controller
{
    /**
     * ReactsController Constructor
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * like a status
     *
     * Store a like record associated with the status
     *
     * @param Status $status The status model
     * @param English\Http\Requests\LikeStatusRequest $request Valid request object
     *
     * @return Illuminate\Http\Response
     * @throws StatusNotFoundException
     **/
    public function like(Status $status, LikeStatusRequest $request)
    {
        return $status->like();
    }
}
