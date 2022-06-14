<?php

namespace Domain\Forms\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class FormQuestionSingleChoice extends FormQuestion
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $label;
    protected $required;

    public function options()
    {
        return $this->HasMany(Option::class);
    }

}
