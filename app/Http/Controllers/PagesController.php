<?php

namespace English\Http\Controllers;

use English\Http\Requests;
use Illuminate\Http\Request;
use English\Http\Controllers\Controller;

class PagesController extends Controller
{
    /**
     * Homepage
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
      if (!\Auth::check()) {
        return view('welcome');
      } else {
        return view('index');
      }
    }

    /**
     * Dashboard
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view('dashboard.main');
    }
}
