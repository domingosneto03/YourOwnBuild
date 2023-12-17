<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestJoin;
use App\Models\Member;


class RequestJoinController extends Controller
{

    public function requestJoin($id_user, $id_project)
    {

        // Create a new invited record in the database.
        RequestJoin::create([
            'id_user' => $id_user,
            'id_project' => $id_project,
        ]);


        // Redirect back to the team page or wherever you want.
        return redirect()->back();
    }

    public function accept(string $id_user, $id_project)
    {
        $request = RequestJoin::where([
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

    public function refuse(string $id_user, $id_project)
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