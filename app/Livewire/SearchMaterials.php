<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Materials;

class SearchMaterials extends Component
{
    public $search = '';

    public function render()
    {
        $materials = Materials::where('title', 'like', '%' . $this->search . '%')
            ->orWhere('description', 'like', '%' . $this->search . '%')
            ->get();

        return view('livewire.search-materials', ['materials' => $materials]);
    }
}
