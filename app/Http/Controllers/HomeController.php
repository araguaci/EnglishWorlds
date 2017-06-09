<?php

namespace English\Http\Controllers;

use Auth;
use English\Status;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $statuses = Status::notReply()->latest()->paginate(10);

            return view('timeline.index')->with('statuses', $statuses);
        }

        return view('home');
    }
}
