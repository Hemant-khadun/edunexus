<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Ramsey\Uuid\Type\Integer;

class GradeSelection extends Component
{
    public $selectedGrade;
    public $programs;
    
    public function mount() {
        $this->selectedGrade = auth()->user()->grade;
    }

    public function selectGrade($grade)
    {
        $userId = auth()->user()->id;

        User::where('id', $userId)->update(['grade' => $grade]);

        $this->selectedGrade = $grade;
    }

    public function render()
    {
        return view('livewire.grade-selection');
    }
}
