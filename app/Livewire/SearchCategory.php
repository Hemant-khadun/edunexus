<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class SearchCategory extends Component
{
    
    public $search = '';

    public function render()
    {
        $categories = Category::where('title', 'like', '%' . $this->search . '%')
            ->orWhere('description', 'like', '%' . $this->search . '%')
            ->get();

        return view('livewire.search-category', ['categories' => $categories]);
    }
}
