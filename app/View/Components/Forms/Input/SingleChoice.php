<?php

namespace App\View\Components\Forms\Input;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use function view;

class SingleChoice extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $name;
    public $title;
    public $required;
    public $id;
    public $value;

    public function __construct($title, $name, $required, $id, $value)
    {
        $this->name = $name;
        $this->title = $title;
        $this->required = $required;
        $this->id = $id;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
        return view('components.forms.input.single-choice');
    }
}
