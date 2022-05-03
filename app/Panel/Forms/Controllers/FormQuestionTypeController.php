<?php

namespace App\Panel\Forms\Controllers;

use App\Models\FormQuestionType;
use App\Panel\Shared\Controller;

class FormQuestionTypeController extends Controller
{
    public function show()
    {
        $types = FormQuestionType::all();
        return view('forms/question',
            [
                'types' => $types,
            ]);
    }
}
