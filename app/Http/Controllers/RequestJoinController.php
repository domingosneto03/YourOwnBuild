<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestJoin;
use App\Models\Member;

class RequestJoinController extends Controller
{
    public function accept(string $id)
    {
        $request = RequestJoin::findOrFail($id);
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

    public function refuse(string $id)
    {
        $request = RequestJoin::findOrFail($id);
        // Delete the join request
        $request->delete();

        return redirect()->back();
    }
}
