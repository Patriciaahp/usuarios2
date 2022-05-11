<?php

namespace App\Panel\Questions\Controllers;

use App\Http\Controllers\Controller;
use Domain\Forms\Models\FormQuestionType;
use function view;

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
