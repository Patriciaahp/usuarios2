<?php

namespace Domain\Users\Users\Actions;

use App\Models\User;
use Domain\Users\Users\ResponseCodes\ResponseCodeUserDeactivated;


class DeactivateUserAction
{
    private $user;
    private $active;

    public function __construct(User $user)
    {
        $this->user = $user;

        $this->active = $user['active'] === true ? $user['active'] = false : null;

    }

    public function execute()
    {
        $this->user->save();

        return new ResponseCodeUserDeactivated($this->user);
    }

}
