<?php

namespace English\Http\Controllers;

use Auth;
use English\Status;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $statuses = Status::notReply()->latest()->paginate(5);

            return view('timeline.index', compact('statuses'));
        }

        return view('welcome');
    }
}
