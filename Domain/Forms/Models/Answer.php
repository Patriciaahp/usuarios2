<?php

namespace Domain\Forms\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function answers()
    {
        return $this->HasMany(Answer::class);
    }

    public function forms()
    {
        return $this->belongsTo(Form::class);
    }

    public function formQuestions()
    {
        return $this->belongsTo(FormQuestion::class);
    }

    public function formSessions()
    {
        return $this->belongsTo(FormSession::class);
    }
}


