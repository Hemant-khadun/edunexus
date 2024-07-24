<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Topic;
use Illuminate\Support\Facades\Auth;

class SearchTopics extends Component
{
    public $search = '';

    public function render()
    {
        $user =  Auth::user();
        $userRole = $user->role;
        $currentId = Auth::user()->id;

        $topicsQuery = Topic::query();

        if ($userRole === 'Tutor') {
            $topicsQuery->where('author_id', $currentId);
        }

        if($this->search != ''){
            $topicsQuery->where('name', 'like', '%' . $this->search . '%');
        }

        $topics = $topicsQuery->get();
        
        return view('livewire.search-topics', ['topics' => $topics]);
    }
}
