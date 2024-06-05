<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProController extends Controller
{
    public function editProfile()
    {
        return view('profile_user.get_profile');
    }
}
