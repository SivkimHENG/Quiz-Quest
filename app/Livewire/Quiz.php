<?php

namespace App\Livewire;

use Livewire\Component;

class Quiz extends Component
{

    public $question;
    public $options = [];
    public $correctOption;
    public $selectedOption = null;
    public $feedback = null;


    public function mount()
    {
        $this->loadQuestion();
    }

    //TODO: Hmmm .. loadQuestion should be loadquestion database
    public function loadQuestion()
    {
        $this->question = "What is the capital of France?";
        $this->options = ['Paris', 'London', 'Berlin', 'Rome'];
        $this->correctOption = 0;

        $this->selectedOption = null;
        $this->feedback = null;
    }
    public function selectOption($index)
    {
        $this->selectedOption = $index;

        if ($index == $this->correctOption) {
            $this->feedback = 'Correct! 🎉';
        } else {
            $this->feedback = 'Incorrect. 😢 Try again!';
        }
    }


    public function render()
    {
        return view('livewire.quiz')->layout('layouts.app');
    }
}
