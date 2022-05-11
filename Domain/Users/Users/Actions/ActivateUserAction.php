<?php

namespace Domain\Users\Users\Actions;

use Domain\Users\Models\User;
use Domain\Users\Users\ResponseCodes\ResponseCodeUserActivated;


class ActivateUserAction
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;

    }

    public function execute()
    {
        $this->user->active = true;
        $this->user->remember_token = null;
        $this->user->save();


        return new ResponseCodeUserActivated($this->user);
    }


}
