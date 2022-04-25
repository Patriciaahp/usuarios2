<?php

namespace Domain\Users\Users\Actions;

use App\Models\User;
use Domain\Users\Users\ResponseCodes\ResponseCodePasswordUpdated;


class UpdatePasswordAction
{

    private $password;
    private $user;


    public function __construct(User $user, array $data)
    {
        $this->user = $user;


        $this->password = isset($data['password']) ? $data['password'] : null;
    }

    public function execute()
    {
        $data['password'] = bcrypt($this->password);

        $this->user->fill($data);

        $this->user->save();

        return new ResponseCodePasswordUpdated($this->user);
    }
}