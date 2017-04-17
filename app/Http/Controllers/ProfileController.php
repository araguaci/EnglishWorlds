<?php

namespace English\Http\Controllers;

use English\User;
use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
  public function getProfile($username) {
    $user = User::where('name', $username)->first();

    if(!$user){
      abort(404);
    }
    $statuses = $user->statuses()->notReply()->get();

    return view('profile.index')->with('user', $user)->with('statuses', $statuses)->with('authUserIsFriend', Auth::user()->isFriendsWith($user));
  }

  public function getEdit(){
    return view('profile.edit');
  }

  public function postEdit(Request $request){
    $this->validate($request, [
      'name' => 'alpha|max:50'
    ]);

    Auth::user()->update([
      'name' => $request->input('name')
    ]);

    return redirect()->route('profile.edit')->with('info', 'Your profile has been updated.');
  }
}
