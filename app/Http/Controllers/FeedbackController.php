<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function Feedback_table()
    {
        $feedbacks = DB::table('feedback')
        ->join('users', 'feedback.user_id', '=', 'users.id')
        ->select('feedback.*', 'users.name', 'users.email')
        ->get();
        return view('/feedback_table', compact('feedbacks'));
    }

    public function viewFeedback($id)
    {
        $feedbacks = Feedback::find($id);
        return view('feedback.view_feedback', compact('feedbacks'));
    }

    public function editFeedback($id)
    {
        $feedback = Feedback::find($id);
        return view('feedback.edit_feedback', compact('feedback'));
    }


    public function updateFeedback(Request $request, $id)
    {
        $feedback = Feedback::find($id);
        $feedback->feedback_by = $request->input('feedback_by');
        $feedback->user_id = $request->input('user_id');
        $feedback->feedback_description = $request->input('feedback_description');
        $feedback->save();
        return redirect()->route('feedback')->with('success', 'Report updated successfully.');
    }

    public function deleteFeedback($id)
    {
        $feedback = Feedback::find($id);
        $feedback->delete();
        return redirect()->route('feedback');
    }


    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();


        return redirect()->route('login');
    }

    public function showMap()
    {
        return view('map');
    }
}
