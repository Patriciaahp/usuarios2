<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Domain\Users\Users\Actions\DeleteUserAction;
use Livewire\Component;

class CreateUser extends Component
{

    public function render()
    {
        $user = User::class;
        return view('livewire.create-user', ['user'=>$user]);
    }

}
