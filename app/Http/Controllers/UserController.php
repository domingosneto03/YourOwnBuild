<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App\Models\User;

class UserController extends Controller
{
    // Update values in database
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'bio' => ['required'],
            'job' => ['required', 'max:255'],
            'address' => ['required', 'max:255'],
        ]);

        $user = User::findOrFail($id);
        $user->update($validatedData);

        Session::flash('success', 'Updated profile with success.');
        // Redirect the user to the project page after user edition
        return redirect('/user/' . $user->id . '/profile');
    }

    public function searchUsers(Request $request)
    {
        $name = $request->input('name');

        $users = User::where('name', 'ilike', '%' . $name . '%')->orderBy('name', 'asc')->get();
        
        return response()->json($users);
    }

    public function autocomplete(Request $request)
    {
        $query = $request->get('query');
        $users = User::where('name', 'ilike', '%' . $query . '%')->orderBy('name', 'asc')->pluck('name');
        return view('partials.autocomplete', compact('users'));
    }
}
