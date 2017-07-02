<?php

namespace English\Http\Controllers;

use Auth;
use Image;
use English\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
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

        // Return view with profile owner and his statuses and friends
        if (Auth::check()) {
            return view('profile.index')->with('user', $user)->with('statuses', $statuses)->with('authUserIsFriend', Auth::user()->isFriendsWith($user));
        } else {
            return view('profile.public')->with('user', $user)->with('statuses', $statuses);
        }
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
        // FIXME: Validation not working
        /*
        $this->validate($request, [
            'name' => 'bail|required|alpha|min:4|max:50|unique:users',
            'firstName' => 'min:3|max:10|alpha',
            'lastName' => 'min:3|max:15|alpha',
            'location' => 'min:4|max:30',
            'oldPassword' => "password_hash_check:$hashed_password|string|min:6",
            'password' => 'required_with:oldPassword|confirmed|min:6',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ], $messages);
        */
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
            $filename = time() . Auth::user()->id . random_int(0, time());
            $extension = '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('/img/avatars/' . $filename . $extension));
            Image::make($avatar)->resize(30, 30)->save(public_path('/img/avatars/30x30/' . $filename . $extension));
            Image::make($avatar)->resize(35, 35)->save(public_path('/img/avatars/35x35/' . $filename . $extension));
            Image::make($avatar)->resize(39, 39)->save(public_path('/img/avatars/39x39/' . $filename . $extension));
            Auth::user()->avatar = $filename . $extension;
            Auth::user()->save();
        }

        // Redirect to the same page with a flashed message
        return redirect()->route('profile.index', ['username' => Auth::user()->name])->with('info', 'Your profile has been updated.');
    }
    /**
     * Get profile image of user
     *
     * @param Username
     *
     * @var string
     *
     * @return string (path to the avatar in public/img/avatars)
     */
    public function getUserImage($username)
    {
        $user = User::where('name', $username)->first();
        if (!$user) {
            abort(404);
        }
        return $user->avatar;
    }
}
