<?php

namespace App\Http\Livewire\Users;

use App\Panel\Users\Filters\UserFilter;
use Domain\Users\Models\User;
use Domain\Users\Users\Actions\ActivateUserAction;
use Domain\Users\Users\Actions\DeactivateUserAction;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
{
    use WithPagination;

    public $columns = ['Id', 'Name', 'Surname', 'Email', 'Created_at'];
    public $selectedColumns = [];
    public $per_page = 10;
    public $search;
    public $sortColumn = "id";
    public $sortDirection = "asc";
    public $from;
    public $to;
    public $user;


    protected $queryString = [
        'search' => ['except' => ''],
        'sortColumn' => [],
        'sortDirection' => [],
        'from' => ['except' => ''],
        'to' => ['except' => ''],
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

    public function active(User $user)
    {
        if ($user->active) {
            $action = new DeactivateUserAction($user);
        } else {
            $action = new ActivateUserAction($user);

        }
        $action->execute();
        $user->save();
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

    public function render(UserFilter $userFilter)
    {
        return view('users/livewire.users-table')
            ->with(['users' => $this->getUsers($userFilter)]);
    }

    protected function getUsers(UserFilter $userFilter)
    {
        $users = User::query()->filterBy($userFilter, array_merge([
            'search' => $this->search,
            'from' => $this->from,
            'to' => $this->to,
        ]))
            ->orderBy($this->sortColumn, $this->sortDirection)
            ->paginate($this->per_page);
        $users->appends($userFilter->valid());

        return $users;
    }
}
