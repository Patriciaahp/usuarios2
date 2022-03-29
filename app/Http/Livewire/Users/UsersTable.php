<?php

namespace App\Http\Livewire\Users;

use App\Filters\UserFilter;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
{
    use WithPagination;
    public $columns = ['Id','Name','Surname','Email'];
    public $selectedColumns = [];
    public $per_page=10;
    public $search;

    protected $queryString = [
        'search' => ['except'=> ''],
    ];
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function updatingPerPage()
    {
        $this->resetPage();
    }
    public function mount()
    {
        $this->selectedColumns = $this->columns;
    }
    public function render()
    {
        $users = User::query()->when($this->search, function ($query){
            return $query->where ('name', 'LIKE', "%{$this->search}%");
        })->paginate($this->per_page);
        return view('livewire.users-table',['users' => $users]);
    }
}
