<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function Feedbackpage()
    {
        $feedbacks = Feedback::get()->latest();
        dd($feedbacks);
        return view('feedback_table', compact('feedbacks'));
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();


        return redirect()->route('login');
    }
}
