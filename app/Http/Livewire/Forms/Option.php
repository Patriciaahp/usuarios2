<?php

namespace App\Http\Livewire\Forms;

use Livewire\Component;
use function view;

class Option extends Component
{
    public function create()
    {
        $this->validate(
            [

            ]
        );
        Option::create(
            [

            ]
        );
    }

    public function render()
    {
        return view('questions.livewire.option');
    }
}
