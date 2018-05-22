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
            $statuses = $tag->statuses()->latest()->get();
        } else {
            $statuses = Status::latest()->get();
        }

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
          'tag_id' => 'required|exists:tags,id',
        ]);

        $status = Status::create([
          'user_id' => auth()->id(),
          'tag_id'  => $request->tag_id,
          'body'    => $request->body,
        ]);

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
