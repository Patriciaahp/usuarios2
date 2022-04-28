<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Builder;

class FormQuery extends Builder
{

    public function findById($id)
    {
        return $this->where('id', $id)->first();
    }

}
