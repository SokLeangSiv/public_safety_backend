<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function Feedbackpage()
    {
        return view('feedback_table');
    }
}
