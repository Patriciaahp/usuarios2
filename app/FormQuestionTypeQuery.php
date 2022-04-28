<?php

namespace App;

use Illuminate\Database\Query\Builder;

class FormQuestionTypeQuery extends Builder
{
    public function findByName($internalname)
    {
        return $this->where('internal_name', $internalname)->first();
    }
}
