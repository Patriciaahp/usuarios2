<?php

namespace App;

use Illuminate\Database\Query\Builder;

class FormQuestionTypeQuery extends Builder
{
    public function findByName($name)
    {
        return $this->where('name', $name)->first();
    }
}
