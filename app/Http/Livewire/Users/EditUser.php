<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class EditUser extends Component
{
    public function render()
    {
        $user = User::class;
        return view('livewire.edit-user', ['user'=>$user]);
    }
}
