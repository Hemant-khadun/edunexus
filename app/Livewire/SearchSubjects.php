<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Subjects;

class SearchSubjects extends Component
{
    public $search = '';

    public function render()
    {
        $subjects = Subjects::where('title', 'like', '%' . $this->search . '%')
            ->orWhere('description', 'like', '%' . $this->search . '%')
            ->get();

        return view('livewire.search-subjects', ['subjects' => $subjects]);
    }
}
