<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function updateFbChart(Request $request, $id)
    {

        $feedback = Feedback::findOrFail($id);

        $feedback->fb_chart1 = $request->fb_chart1;

        $feedback->update($request->all());

        return view('APark.home',);
    }
}
