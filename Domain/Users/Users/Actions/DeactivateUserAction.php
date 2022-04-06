<?php

namespace Domain\Users\Users\Actions;

use App\Models\User;
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

        return new ResponseCodeUserDeactivated();
    }

}
