<?php

namespace Domain\Users\User\Actions;

use Domain\Users\Models\User;
use Domain\Users\User\ResponseCodes\ResponseCodeUserDeleted;

class DeleteUserAction
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function execute()
    {
        $this->user->forceDelete();
        return new ResponseCodeUserDeleted();
    }

}
