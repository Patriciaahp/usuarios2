<?php

namespace App\Http\Livewire\Forms;

use Domain\Forms\Models\Form;
use Domain\Forms\Models\FormQuestion;
use Domain\Forms\Models\FormSession;
use Livewire\Component;
use function view;

class Sessions extends Component
{
    public $form;
    public $questions;
    public $sessions;

    public function mount($id)
    {
        $this->form = Form::find($id);

        $this->questions = FormQuestion::all()
            ->where('form_id', '=', $id);

        $this->sessions = FormSession::all()
            ->where('form_id', '=', $id);

    }

    public function render()
    {
        return view('sessions.livewire.sessions');
    }
}
