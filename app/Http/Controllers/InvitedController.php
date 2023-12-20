<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        $user = User::where('name', $request->fullName)->firstOrFail();
        
        // Create a new invited record in the database.
        Invited::create([
            'id_user' => $user->id,
            'id_project' => $id_project,
        ]);


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

        return redirect()->back();
    }

    public function refuse(string $id, $id_project)
    {
        $request = RequestJoin::where([
            'id_user' => $id_user,
            'id_project' => $id_project,
        ])->firstOrFail();
        // Delete the join request
        $request->delete();

        return redirect()->back();
    }
}
