<?php

namespace English\Http\Controllers;

use Auth;
use Response;
use English\User;
use English\Status;
use Illuminate\Http\Request;

/**
 * @author Salim Djerbouh
 *
 * @version 0.2
 */
class StatusController extends Controller
{
    public function postStatus(Request $request)
    {
        print_r($request->all());
        if ($request->ajax()) {
            $this->validate($request, [
        'status' => 'required|max:1000',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);

            Auth::user()->statuses()->create([
        'body' => $request->input('status'),
      ]);

            return $request->input('status');
        }
    }

    public function getStatus(Request $request)
    {
        if ($request->ajax()) {
            $status = Status::notReply()->orderBy('created_at', 'desc')->first();

            return view('status.status')->with([
          'status' => $status,
        ])->render();
        }
    }

    public function postReply(Request $request)
    {
        $this->validate($request, [
        'replyBody' => 'required|max:1000',
        'required' => 'The reply body is required.',
      ]);
      // Check if the status being replied on exists
      $status = Status::notReply()->find($request->statusID);
        if (!$status) {
            return Response::json(['errors' => 'Status doesn\'t exists']);
        }
        $reply = Status::create([
        'body' => $request->replyBody,
      ])->user()->associate(Auth::user());
        $status->replies()->save($reply);
            // return response()->json($reply);
      return view('status.comment')->with([
        'reply' => $reply,
        'status' => $status,
      ])->render();
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
        if (Auth::user()->name !== $status->user->name) {
            return redirect()->back();
        }
        $status->delete();

        return redirect()->route('home')->with(['info', 'Post has been deleted']);
    }
}
