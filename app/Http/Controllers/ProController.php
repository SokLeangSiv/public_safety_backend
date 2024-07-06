<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class ProController extends Controller
{
    public function editProfile()
    {
        //get current user profile
        $user = User::find(Auth::user()->id);
        return view('profile_user.get_profile',compact('user'));
    }
    // ProfileController.php

    public function updateProfile(Request $request)
    {
        // Update current user profile picture
        $user = User::find(Auth::user()->id);
        // Update name, email, and password
        $user->name = $request->name;
        $user->email = $request->email;

        // Only update the password if it's not empty
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect()->back();
    }

    public function updateProfilePicture(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if ($request->hasFile('profile')) {
            $file = $request->file('profile');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('Profile_Picture'), $fileName);
            // Remove the old profile picture if exists
            if ($user->profile_picture) {
                $oldFilePath = public_path('Profile_Picture') . '/' . $user->profile_picture;
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }
            $user->profile_picture = $fileName;
        }
        $user->save();

        return redirect()->back()->with('status', 'Profile picture updated successfully!');
    }

}
