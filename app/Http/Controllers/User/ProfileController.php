<?php

namespace English\Http\Controllers\User;

use Auth;
use Image;
use English\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use English\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function getProfile($username)
    {
        $user = User::where('name', $username)->first();

        if (!$user) {
            abort(404);
        }
        $statuses = $user->statuses()->notReply()->get();

        return view('user.profile.index')->with('user', $user)->with('statuses', $statuses)->with('authUserIsFriend', Auth::user()->isFriendsWith($user));
    }

    public function getEdit()
    {
        return view('profile.edit');
    }

    // Edit profile information

    public function postEdit(Request $request)
    {
        $messages = [
            'password_hash_check' => 'Old password incorrect',
        ];
            // Validate input data
        $hashed_password = Auth::user()->password;
        $this->validate($request, [
            'name' => 'required|alpha|max:50',
            'firstName' => 'min:3|max:10',
            'lastName' => 'min:3|max:15',
            'location' => 'min:4|max:30',
            'oldPassword' => "password_hash_check:$hashed_password|string|min:6",
            'password' => 'required_with:oldPassword|confirmed|min:6',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ], $messages);
        Auth::user()->update([
            // Update the data in DB
            'name' => $request->input('name'),
            'firstName' => $request->input('firstName'),
            'lastName' => $request->input('lastName'),
            'location' => $request->input('location'),
            'password' => bcrypt($request->input('password')),
            'avatar' => $request->file('avatar'),
        ]);
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('/img/avatars/' . $filename));
            Auth::user()->avatar = $filename;
            Auth::user()->save();
        }
        // Redirect to the same page with a flashed message
        return redirect()->route('profile.edit')->with('info', 'Your profile has been updated.');
    }
}
