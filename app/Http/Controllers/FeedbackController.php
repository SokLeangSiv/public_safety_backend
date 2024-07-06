<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{

    public function showForm()
    {

        return view('feedback.feedback_form');
    }

    public function saveFeedback(Request $request)
    {
        $request->validate([

            'feedback_by' => 'required|max:255',

            'feedback_description' => 'required',

        ]);

        Feedback::create([

            'feedback_by' => $request->feedback_by,

            'feedback_description' => $request->feedback_description,


        ]);

        return redirect()->route('feedback')->with('success', 'Feedback created successfully!');
    }

    public function Feedback_table()
    {
        //paginate feedback by 10;
        $feedbacks = Feedback::paginate(10);
        return view('feedback_table', compact('feedbacks'));
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

        $request->validate([
            'feedback_by' => 'required|max:255',
            'feedback_description' => 'required',
        ]);

        $feedback = Feedback::findOrFail($id);

        $feedback->feedback_by = $request->input('feedback_by');

        $feedback->feedback_description = $request->input('feedback_description');

        $feedback->save();

        return redirect()->route('feedback')->with('success', 'Feedback updated successfully.');
    }



    public function deleteFeedback($id)
    {
        $feedback = Feedback::find($id);

        $feedback->delete();

        return redirect()->route('feedback');
    }


    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function searchFeedback(Request $request)
    {
        $search = $request->search;

        $feedbacks = Feedback::where('feedback_by', 'like', '%' . $search . '%')
            ->paginate(10);
            return view('feedback_table', compact('feedbacks','search'));
    }

}
