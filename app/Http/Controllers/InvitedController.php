<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Invited;
use App\Models\Member;
use App\Models\User;

class InvitedController extends Controller
{
    public function invite(Request $request, $id_project)
    {
        $request->validate([
            'fullName' => ['required','max:255'], 
        ]);

        $user = User::where('name', $request->fullName)->first();

        if (!$user) {
            // User not found
            Session::flash('error', 'User not found.');
            return redirect()->back();
        }

        // Check if the user is already invited
        if (Invited::where('id_user', $user->id)->where('id_project', $id_project)->exists()) {
            // User already invited
            Session::flash('error', 'User has already been invited.');
            return redirect()->back();
        }

        // Check if the user is already a member of the team
        if (Member::where('id_user', $user->id)->where('id_project', $id_project)->exists()) {
            // User already member
            Session::flash('error', 'User is already a member of the team.');
            return redirect()->back();
        }

        // Create a new invited record in the database.
        Invited::create([
            'id_user' => $user->id,
            'id_project' => $id_project,
        ]);

        Session::flash('success', 'Invited user with success.');
        // Redirect back to the team page or wherever you want.
        return redirect()->back();
    }

    public function accept(string $id_user, $id_project)
    {
        $request = Invited::where([
            'id_user' => $id_user,
            'id_project' => $id_project,
        ])->firstOrFail();


        // Create a new member record with the required information
        $member = Member::create([
            'id_user' => $request->id_user,
            'id_project' => $request->id_project,
            'role' => 'project_member',
        ]);


        // Delete the join request
        $request->delete();
        Session::flash('success', 'Accepted project invitation with success.');
        return redirect()->back();
    }

    public function refuse(string $id, $id_project)
    {
        $request = Invited::where([
            'id_user' => $id_user,
            'id_project' => $id_project,
        ])->firstOrFail();
        // Delete the join request
        $request->delete();

        Session::flash('success', 'Refused project invitation with success.');
        return redirect()->back();
    }
}
