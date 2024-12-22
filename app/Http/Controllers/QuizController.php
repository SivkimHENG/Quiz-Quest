<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\QuizAnswer;
use Illuminate\Http\Request;

class QuizController extends Controller
{

    public function show($id)
    {
        $quizzes = Quiz::with('answers')->get();
        return view('quiz', compact('quizzes'));
    }

    public function submit(Request $request, $quizId)
    {
        $quiz = Quiz::with('answers')->findOrFail($quizId);
        $selectedAnswer =  QuizAnswer::find($request->input('answer'));
    }



    public function edit() {}
}
