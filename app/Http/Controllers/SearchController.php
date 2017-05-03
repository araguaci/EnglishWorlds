<?php

namespace English\Http\Controllers;

use DB;
use English\User;

class SearchController extends Controller
{
    public function getResults()
    {
        $query = request('query');

        if (! $query) {
            return redirect()->route('home');
        }
        // Search for users using fuzzy matching
        $users = User::where(DB::raw("CONCAT(firstName, ' ', lastName)"), 'LIKE', "%{$query}%")->orWhere('name', 'LIKE', "%{$query}%")->get();

        return view('search.results')->with('users', $users);
    }
}
