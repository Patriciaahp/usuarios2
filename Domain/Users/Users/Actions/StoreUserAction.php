<?php

namespace Domain\Users\Users\Actions;

use Domain\Users\Models\User;
use Domain\Users\Users\ResponseCodes\ResponseCodeUserStored;
use Illuminate\Support\Str;
use InvalidArgumentException;

class StoreUserAction
{
    /**
     * @param array $data
     */

    private $name;
    private $email;
    private $surname;
    private $password;
    private $user;

    public function __construct(array $data)
    {
        $this->data = $data;

        if (!isset($data['name']))
            throw new InvalidArgumentException('name is required.');

        $this->name = isset($data['name']) ? $data['name'] : null;

        if (!isset($data['email']))
            throw new InvalidArgumentException('email is required.');

        $this->email = isset($data['email']) ? $data['email'] : null;
        $this->surname = isset($data['surname']) ? $data ['surname'] : null;
        $this->password = isset($data['password']) ? $data ['password'] : \Str::random(20);
    }

    public function execute()
    {

        $this->user = User::create([
            'name' => $this->name,
            'surname' => $this->surname,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'remember_token' => Str::random(64)
        ]);

        return new ResponseCodeUserStored($this->user);

    }

}
