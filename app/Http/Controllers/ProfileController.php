<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function show()
    {
        $profileImage = User::find(Auth::id())->image;
        return view('profile_user.get_profile', compact('profileImage'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            // 'email' => 'required|email',
            'password' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $user = User::find(Auth::id());
        $user->name = $request->name;
        // $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        //update img

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $user->image = $name;
        }

        $user->save();


        return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
    }
}
