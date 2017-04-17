<?php

namespace English\Http\Controllers;

use DB;
use English\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
  public function getResults(Request $request)
  {
    $query = $request->input('query');

    if (!$query) {
      return redirect()->route('home');
    }

    $users = User::where(DB::raw("name"), 'LIKE', "%{$query}%")->get();

    return view('search.results')->with('users', $users);
  }
}
