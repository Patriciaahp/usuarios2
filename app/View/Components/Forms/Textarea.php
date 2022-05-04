<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Textarea extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $name;
    public $title;
    public $required;

    public function __construct($title, $name, $required)
    {
        $this->name = $name;
        $this->title = $title;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
        return view('components.forms.textarea');
    }
}
