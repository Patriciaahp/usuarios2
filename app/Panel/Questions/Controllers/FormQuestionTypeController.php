<?php

namespace App\Panel\Questions\Controllers;

use App\Models\FormQuestionType;
use App\Panel\Shared\Controller;
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
