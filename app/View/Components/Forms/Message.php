<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Message extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $name;
    public $title;
    public $required;
    public $placeholder;


    public function __construct($title, $name, $required, $placeholder)
    {
        $this->name = $name;
        $this->title = $title;
        $this->required = $required;
        $this->placeholder = $placeholder;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
        return view('components.forms.message');
    }
}
