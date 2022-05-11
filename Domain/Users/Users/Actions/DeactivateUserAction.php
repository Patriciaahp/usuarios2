<?php

namespace Domain\Users\Users\Actions;

use Domain\Users\Models\User;
use Domain\Users\Users\ResponseCodes\ResponseCodeUserDeactivated;


class DeactivateUserAction
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;


    }

    public function execute()
    {
        $this->user->active = false;
        $this->user->save();

        return new ResponseCodeUserDeactivated($this->user);
    }

}
