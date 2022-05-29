<?php

namespace App\Panel\Users\Queries;

use Illuminate\Database\Eloquent\Builder;

class UserQuery extends Builder
{
    public function findByEmail($email)
    {
        return $this->where('email', $email)->whereActive(1)->firstOrFail();
    }

    public function findById($id)
    {
        return $this->where('id', $id)->first();
    }

}
