<?php

namespace App\Http\Livewire\Users;

use App\Filters\UserFilter;
use App\Models\User;
use Domain\Users\Users\Actions\DeleteUserAction;
use Domain\Users\Users\Actions\StoreUserAction;
use Domain\Users\Users\Actions\UpdateUserAction;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
{
    use WithPagination;
    public $columns = ['Id','Name','Surname','Email', 'Created_at'];
    public $selectedColumns = [];
    public $per_page=10;
    public $search;
    public $sortColumn = "id";
    public $sortDirection = "asc";
    public $from;
    public $to;

    protected $queryString = [
        'search' => ['except'=> ''],
        'sortColumn' => [],
        'sortDirection' => [],
        'from' => ['except' => ''],
        'to' => ['except' => ''],
    ];

    public function delete(User $user)
    {
        $this->user =User::all();
        $this->redirectAction(DeleteUserAction::class);
    }
    public function edit() {
        $this->redirectAction(UpdateUserAction::class);
    }
    public function create() {
       return Redirect::action(StoreUserAction::class);
    }
    public function createEmit() {
        $this->emitTo(CreateUser::class, $this->create());
    }
    public function deleteEmit() {
        $this->emitTo(EditUser::class, $this->delete());
    }
    public static function editRedirect()
    {
        return view('livewire.users-edit');
    }
    public function editUser(){
        return redirect()->route('users');
    }

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
            'from' =>  $this->from,
            'to' =>  $this->to,
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
