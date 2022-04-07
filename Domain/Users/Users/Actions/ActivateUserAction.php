<?php

namespace Domain\Users\Users\Actions;

use App\Models\User;
use Domain\Users\Users\ResponseCodes\ResponseCodeUserActivated;


class ActivateUserAction
{
    private $user;
    private $active;

    public function __construct(User $user)
    {
        $this->user = $user;

        $this->active = ($user['active']) === 1 ? $user['active'] = 0 : $user['active'] = 1;

    }

    public function execute()
    {
        $this->user->save();
        

        return new ResponseCodeUserActivated($this->user);
    }


}
