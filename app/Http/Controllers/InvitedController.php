<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Invited;

class InvitedController extends Controller
{
    public function invite($id_user, $id_project)
    {

        // Create a new invited record in the database.
        Invited::create([
            'id_user' => $id_user,
            'id_project' => $id_project,
        ]);


        // Redirect back to the team page or wherever you want.
        return redirect()->back();
    }
}
