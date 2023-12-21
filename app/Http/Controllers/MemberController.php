<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MemberController extends Controller
{
    public function removeMember($id_user, $id_project)
    {
        $user = Auth::user();

        if (!$this->authorize('canPerformAction', $user)) {
            Session::flash('warning', 'You are not authorized remove users from projects.');
            return redirect()->back();  // Redirect back to the previous page

        }

        $member = Member::where([
            'id_user' => $id_user,
            'id_project' => $id_project,
        ])->firstOrFail();

        $member->delete();

        Session::flash('success', 'Removed user with success.');
        return redirect()->back();
    }
}
