<?php

namespace English\Http\Controllers;

use DB;
use English\Models\User;

class SearchController extends Controller
{
    public function getResults()
    {
        $query = request('query');

        if (!$query) {
            return redirect()->route('/');
        }
        // Search for users using fuzzy matching
        $users = User::where(DB::raw("CONCAT(first_name, ' ', last_name)"), 'LIKE', "%{$query}%")->orWhere('name', 'LIKE', "%{$query}%")->get();
        
        return view('search.results')->with('users', $users);
    }
}
