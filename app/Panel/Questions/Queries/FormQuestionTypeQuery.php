<?php

namespace App\Panel\Questions\Queries;

use Illuminate\Database\Query\Builder;

class FormQuestionTypeQuery extends Builder
{
    public function findByName($name)
    {
        return $this->where('name', $name)->first();
    }
}
