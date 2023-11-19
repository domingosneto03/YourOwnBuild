<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\View\View;

use App\Models\User;

class HomepageController extends Controller
{
    // Display homepage
    public function showHomepage(): View
    {
        return view('pages.homepage');
    }

}
