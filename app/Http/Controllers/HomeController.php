<?php
namespace English\Http\Controllers;

use Auth;

/**
 * @author Salim Djerbouh
 * @version 0.1
 */
class HomeController extends Controller
{
  public function index()
  {
    if (Auth::check()) {
      return view('timeline.index');
    }

    return view('home');
  }
}

 ?>
