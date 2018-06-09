<?php

namespace English\Http\Controllers;

use English\Status;
use English\Tag;
use Illuminate\Http\Request;

class StatusesController extends Controller
{
    /**
     * StatusesController constructor.
     * Restrict access to write methods
     * for authenticated users only.
     *
     * @param none
     *
     * @throws Illuminate\Auth\AuthenticationException
     *
     * @return English\Http\Middleware\RedirectIfAuthenticated
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the statuses.
     *
     * @param Tag $tag
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Tag $tag)
    {
        if ($tag->exists) {
            $statuses = $tag->statuses()->latest();
        } else {
            $statuses = Status::latest();
        }

        if ($username = request('by')) {
            $user = \English\User::where('username', $username)->firstOrFail();

            $statuses->where('user_id', $user->id);
        }

        $statuses = $statuses->get();

        return view('statuses.index', compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'body'   => 'required',
          'tags'   => 'required|between:1,5',
          'tags.*' => 'exists:tags,id|distinct',
        ], [
          'tags.between' => 'You can only choose up to 5 tags',
          'tags.required' => 'You must pick at least 1 tag',
          'body.required' => 'Can\'t post an empty status'
        ]);

        $status = Status::create([
          'user_id' => auth()->id(),
          'body'    => $request->body,
        ]);

        foreach ($request->tags as $tag) {
            $status->tags()->attach($tag);
        }

        return redirect($status->path());
    }

    /**
     * Display the specified resource.
     *
     * @param \English\Status $status
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Status $status)
    {
        return view('statuses.show', compact('status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \English\Status $status
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Status $status)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \English\Status          $status
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Status $status)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \English\Status $status
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status $status)
    {
        //
    }
}
