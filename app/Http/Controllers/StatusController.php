<?php

namespace English\Http\Controllers;

use Auth;
use English\Status;
use English\User;
use Illuminate\Http\Request;
use Response;

/**
 * @author Salim Djerbouh
 *
 * @version 0.2
 */
class StatusController extends Controller
{
    public function postStatus(Request $request)
    {
        if ($request->ajax()) {
            $this->validate($request, [
        'status' => 'required|max:1000',
      ]);

            Auth::user()->statuses()->create([
        'body' => $request->input('status'),
      ]);

            return $request->input('status');
        }
    }

    public function getStatus(Response $response)
    {
        if (Auth::check()) {
            return view('status.status');
        }

        return view('home');
    }

    public function postReply(Request $request, $statusId)
    {
        $this->validate($request, [
      "reply-{$statusId}" => 'required|max:1000', 'required' => 'The reply body is required.',
    ]);

        $status = Status::notReply()->find($statusId);

        if (!$status) {
            return redirect()->route('home');
        }

        if (Auth::user()->id == $status->user->id) {
            return redirect()->route('home');
        }

        $reply = Status::create([
          'body' => $request->input("reply-{$statusId}"),
        ])->user()->associate(Auth::user());
        $status->replies()->save($reply);

        return redirect()->back();
    }

    public function getLike($statusId)
    {
        $status = Status::find($statusId);

        if (!$status) {
            return redirect()->route('home');
        }

        if (Auth::user()->hasLikedStatus($status)) {
            return redirect()->back();
        }

        $like = $status->likes()->create([]);
        Auth::user()->likes()->save($like);

        return redirect()->back();
    }

    public function getDelete($statusId)
    {
        $status = Status::where('id', $statusId)->first();
        $status->delete();

        return redirect()->route('home')->with(['info', 'Post has been deleted']);
    }
}
