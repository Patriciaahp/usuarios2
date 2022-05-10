<?php

namespace App\Http\Livewire\Forms;

use App\Models\Form;
use App\Models\FormQuestion;
use Livewire\Component;
use function view;

class Detail extends Component
{
    public $form;
    public $questions;

    public function mount($id)
    {
        $this->form = Form::find($id);

        $this->questions = FormQuestion::all()
            ->where('form_id', '=', $id)
            ->sortBy('order_');

    }

    public function render()
    {

        return view('forms/livewire.detail');
    }
}
