<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
{
    use WithPagination;

    public $per_page=10;

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function render()
    {
        $users = User::query()->paginate($this->per_page);
        return view('livewire.users-table',['users' => $users]);
    }
}
