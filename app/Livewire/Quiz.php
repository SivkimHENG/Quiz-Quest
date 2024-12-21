<?php




namespace App\Livewire;

use App\Models\Question;
use App\Models\Quiz as ModelsQuiz;
use Livewire\Component;


class Quiz extends Component
{
    public $questions = [];
    public $currentQuestionIndex = 0;
    public $selectedOption = null;
    public $feedback = null;

    public $question = '';
    public $options = [];
    public $correctOption = null;


    public function mount()
    {
        $this->loadQuestions();
    }

    public function loadQuestions()
    {
        $this->questions = Question::with('answers')->get();

        $this->loadCurrentQuestion();
    }

    public function loadCurrentQuestion()
    {

        if (isset($this->questions[$this->currentQuestionIndex])) {
            $question = $this->questions[$this->currentQuestionIndex];

            $this->question = $question->questions;  // Question text
            $this->options = $question->answers->pluck('answer')->toArray();  // Get the answer options
            $this->correctOption = $question->answers->where('correct_answer', true)->first()?->id;  // Correct answer ID
        } else {
            $this->question = 'No more questions available.';
            $this->options = [];
            $this->correctOption = null;
        }
    }

    public function selectOption($index)
    {
        $this->selectedOption = $index;

        // Check if the selected option is correct
        if ($this->options[$index] == $this->correctOption) {
            $this->feedback = 'Correct! 🎉';
        } else {
            $this->feedback = 'Incorrect. 😢 Try again!';
        }
    }

    public function nextQuestion()
    {

        if ($this->currentQuestionIndex < count($this->questions) - 1) {
            $this->currentQuestionIndex++;
            $this->loadCurrentQuestion();
            $this->selectedOption = null;
            $this->feedback = null;
        } else {
            $this->dispatchBrowserEvent('quizCompleted');
        }
    }

    public function render()
    {
        return view('livewire.quiz')->layout('layouts.app');
    }
}
