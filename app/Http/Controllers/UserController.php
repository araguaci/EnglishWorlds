<?php

namespace English\Http\Controllers;

use English\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * @author Salim Djerbouh <tbitw31@gmail.com>
 * @version v0.1.1
 */

class UserController extends Controller {


  public function signup(Request $request) {

    $this->validate($request, [
      'email' => 'required|email|unique:users',
      'first_name' => 'required|max:120',
      'password' => 'required|min:4'
    ]);
    $email = request('email');
    $first_name = request('first_name');
    $password = bcrypt(request('password'));

    $user = new User();
    $user->email = $email;
    $user->first_name = $first_name;
    $user->password = $password;

    $user->save();

    Auth::login($user);

    return redirect()->route('dashboard');

  }

  public function signin(Request $request) {

    $this->validate($request, [
      'email' => 'required|email',
      'password' => 'required'
    ]);

    if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
      return redirect()->route('dashboard');
    }
    return redirect()->back();
  }

  public function getLogout() {

    Auth::logout();
    return redirect()->route('home');
  }

  public function getAccount() {
    
    return view('account', ['user' => Auth::user()]);
  }
}
