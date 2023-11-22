<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Replace with your actual model
use App\Models\Project;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        // Validate the query
        $request->validate([
            'query' => 'required|min:2',
        ]);

        // Perform the search
        $users = User::where('name', 'ilike', '%' . $query . '%')->get(); // Adjust based on your needs

        // Build the HTML response
        $response = $this->formatResults($users, $query);

        // Return a JSON response
        return response()->json(['html' => $response]);
    }

    private function formatResults($users, $query)
    {
        $hint = '';

        foreach ($users as $user) {
            // Assuming $user->name and $user->url are the fields to be used
            if (stristr($user->name, $query)) {
                $hint .= "<div class='search-card'><a href='../user/$user->id' target='_blank'>{$user->name}</a></div>";
            }
        }

        return $hint ?: "<p class='search-card'>no suggestion</p>";
    }
}