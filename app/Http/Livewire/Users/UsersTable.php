<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
{
    use WithPagination;

    public $per_page=10;
    public $search;

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function render()
    {
        $users = User::query()->when($this->search, function ($query){
           return $query->where ('name', 'LIKE', "%{$this->search}%");
        })->paginate($this->per_page);
        return view('livewire.users-table',['users' => $users]);
    }
}
