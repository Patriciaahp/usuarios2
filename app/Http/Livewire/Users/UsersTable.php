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
    public $sortColumn = "id";
    public $sortDirection = "asc";

    protected $queryString = [
        'search' => ['except'=> ''],
        'sortColumn' => [],
        'sortDirection' => [],
    ];
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function updatingPerPage()
    {
        $this->resetPage();
    }
    public function updatingSortColumn()
    {
        $this->resetPage();
    }

    public function updatingSortDirection()
    {
        $this->resetPage();
    }
    public function mount()
    {
        $this->selectedColumns = $this->columns;
    }
    public function sort($column)
    {
        $this->sortColumn = $column;
        $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
    }
    protected function getUsers(UserFilter $userFilter)
    {
        $users = User::query()->filterBy($userFilter, array_merge([
            'search' => $this->search,
        ]))
            ->orderBy($this->sortColumn, $this->sortDirection)
            ->paginate($this->per_page);
        $users->appends($userFilter->valid());

        return $users;
    }
    public function render(UserFilter $userFilter)
    {

        return view('livewire.users-table',['users' => $this->getUsers($userFilter)]);
    }
}
