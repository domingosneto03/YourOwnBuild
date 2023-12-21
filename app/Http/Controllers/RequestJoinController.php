<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestJoin;
use App\Models\Member;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class RequestJoinController extends Controller
{

    public function requestJoin($id_user, $id_project)
    {

        $user = Auth::user();

        if (!$this->authorize('canPerformAction', $user)) {
            Session::flash('warning', 'You are not authorized to request to join other projects.');
            return redirect()->back();  // Redirect back to the previous page

        }

        // Create a new invited record in the database.
        RequestJoin::create([
            'id_user' => $id_user,
            'id_project' => $id_project,
        ]);


        Session::flash('success', 'Requested to join the project with success.');
        // Redirect back to the team page or wherever you want.
        return redirect()->back();
    }

    public function accept(string $id_user, $id_project)
    {
        $user = Auth::user();

        if (!$this->authorize('canPerformAction', $user)) {
            Session::flash('warning', 'You are not authorized handle requests.');
            return redirect()->back();  // Redirect back to the previous page

        }

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
        Session::flash('success', 'Accepted user with success.');
        return redirect()->back();
    }

    public function refuse(string $id_user, $id_project)
    {
        $user = Auth::user();

        if (!$this->authorize('canPerformAction', $user)) {
            Session::flash('warning', 'You are not authorized handle requests.');
            return redirect()->back();  // Redirect back to the previous page

        }

        $request = RequestJoin::where([
            'id_user' => $id_user,
            'id_project' => $id_project,
        ])->firstOrFail();
        // Delete the join request
        $request->delete();
        Session::flash('success', 'Refused user with success.');
        return redirect()->back();
    }
}
