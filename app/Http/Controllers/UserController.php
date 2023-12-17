<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

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

        // Redirect the user to the project page after user edition
        return redirect('/user/' . $user->id . '/profile');
    }
}
