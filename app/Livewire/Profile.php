<?php

namespace App\Livewire;

use Livewire\Component;
use App\Livewire\layout;
use Livewire\WithFileUploads;


class Profile extends Component
{

    use WithFileUploads;
    public $user;
    public $name;
    public $email;
    public $profilePhoto;



    public function mount() {}






    public function render()
    {
        return view('livewire.profile')->layout('layouts.app');
    }
}
