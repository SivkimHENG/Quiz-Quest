<?php


namespace App\Livewire;

use App\Models\Question;
use Livewire\Component;
use App\Livewire\layout;

class Quiz extends Component
{

    public $questions;
    public $totalQuestions;
    public $selectedAnswer;
    public $feedback = '';
    public $score;
    public $currentQuestionIndex;
    protected $rules = [
        'selectedAnswer' => 'required|exists:answer,id'
    ];


    public function mount()
    {
        $this->questions = Question::with('answers')->get();
        $this->totalQuestions = $this->questions->count();
        $this->selectedAnswer = null;
        $this->feedback = '';
    }


    public function submitAnswer()
    {

        $this->validate();
        $currentQuestions =  $this->questions[$this->currentQuestionIndex];
        $correctAnswer = $currentQuestions->answers->where('correct_answer', true)->first();


        if ($this->selectedAnswer == $correctAnswer->id) {
            $this->feedback  = 'Great Job';
            $this->score++;
        } else {
            $this->feedback = 'Incorrect Try again !';
        }
        $this->currentQuestionIndex++;

        if ($this->currentQuestionIndex >= $this->totalQuestions) {
            $this->feedback = 'Quiz Complete! Your score : {$this->score}/{$this->totalQuestions} ';
        }

        $this->selectedAnswer = null;
    }



    public function render()
    {
        return view('livewire.quiz')->layout('layouts.app');
    }
}
