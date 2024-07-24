<?php

namespace App\Livewire;

use App\Models\CourseWrapper;
use App\Models\Followers;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserList extends Component
{
    
    public $search = '';
    public $filter_active = ''; 
    public $filter_role = '';
    
    public function render()
    {
        $currentUser = User::findOrFail(auth()->user()->id);
        $userRole = $currentUser->role;
        if($userRole == 'Administrator'){

            $query = User::query();

            $query->where(function ($subquery) {
                $subquery->where('name', 'like', "%{$this->search}%")
                        ->orWhere('email', 'like', "%{$this->search}%");
            });

            if ($this->filter_active !== '') {
                $query->where('active', $this->filter_active);
            }

            if ($this->filter_role !== '') {
                $query->where('role', $this->filter_role);
            }

            $users = $query->get();

        }else if($userRole == 'Tutor'){

            $enrollmentList = CourseWrapper::where('author_id', $currentUser->id)->pluck('id');
            $users = Followers::whereIn('course_id', $enrollmentList)->with('user:id,name','course:id,title')->get();
        }else{
            $query = User::query();

            $query->where(function ($subquery) {
                $subquery->where('name', 'like', "%{$this->search}%")
                        ->orWhere('email', 'like', "%{$this->search}%");
            });

            if ($this->filter_active !== '') {
                $query->where('active', $this->filter_active);
            }

            $query->where('role', '3'); // tutor only

            $users = $query->get();
        }

        return view('livewire.user-list', ['users' => $users]);
    }
}
