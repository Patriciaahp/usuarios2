<?php

namespace Domain\Users\Users\Actions;

use App\Models\User;


class ActivateUserAction
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function execute()
    {
        if ($this->user->active === 0) {
            $this->user->active = 1;
        } else {
            $this->user->active = 0;
        }

        $this->user->save();

    }

}
