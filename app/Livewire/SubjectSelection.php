<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class SubjectSelection extends Component
{
    public $subjects;
    public $selectedSubject;

    public function mount() {
        $this->selectedSubject = auth()->user()->subject;
    }

    public function selectSubject($subject)
    {
        $userId = auth()->user()->id;

        User::where('id', $userId)->update(['subject' => $subject]);

        $this->selectedSubject = $subject;
    }

    public function render()
    {
        return view('livewire.subject-selection');
    }
}
