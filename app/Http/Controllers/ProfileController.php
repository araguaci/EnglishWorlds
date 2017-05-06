<?php

namespace English\Http\Controllers;

use Auth;
use English\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function getProfile($username)
    {
        $user = User::where('name', $username)->first();

        if (! $user) {
            abort(404);
        }
        $statuses = $user->statuses()->notReply()->get();

        return view('profile.index')->with('user', $user)->with('statuses', $statuses)->with('authUserIsFriend', Auth::user()->isFriendsWith($user));
    }

    public function getEdit()
    {
        return view('profile.edit');
    }

  // Edit profile information

  public function postEdit(Request $request)
  {
      // Validate input data
    $this->validate($request, [
      'name'      => 'required|alpha|max:50',
      'firstName' => 'min:3|max:10',
      'lastName'  => 'min:3|max:15',
      'location'  => 'min:4|max:30',
    ]);

      Auth::user()->update([
      // Update the data in DB
      'name'      => $request->input('name'),
      'firstName' => $request->input('firstName'),
      'lastName'  => $request->input('lastName'),
      'location'  => $request->input('location'),
    ]);

    // Redirect to the same page with a flashed message
    return redirect()->route('profile.edit')->with('info', 'Your profile has been updated.');
  }
}
