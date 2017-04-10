<?php

namespace English\Http\Controllers;

use English\User;
use Illuminate\Http\Request;

/**
 * @author Salim Djerbouh <tbitw31@gmail.com>
 * @version v0.1.1
 */

class UserController extends Controller {

  public function signup(Request $request) {

    $email = request('email');
    $first_name = request('first_name');
    $password = bcrypt(request('password'));

    $user = new User();
    $user->email = $email;
    $user->first_name = $first_name;
    $user->password = $password;

    $user->save();

    return redirect()->back();

  }

  public function signin(Request $request) {

  }
}
