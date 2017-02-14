<?php

namespace English\Http\Controllers;

use Illuminate\Http\Request;
/**
 *
 */
class HomeController extends Controller
{
  public function getSignup(){
    return view('auth.signup');
  }
  public function postSignup(Request $request){
     
  }
}

 ?>
