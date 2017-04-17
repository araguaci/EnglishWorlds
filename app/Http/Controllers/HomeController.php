<?php

namespace English\Http\Controllers;

use Auth;
use English\Status;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
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
        $statuses = Status::notReply()->where(function($query){
          // FIXME: Method lists from the function friends() in User:58 does not exist
          return $query->where('user_id', Auth::user()->id)->orWhereIn('user_id', Auth::user()->friends()->all('id')); })->orderBy('created_at', 'desc')->paginate(10);

        return view('timeline.index')->with('statuses', $statuses);
      }
      return view('home');
    }
}
