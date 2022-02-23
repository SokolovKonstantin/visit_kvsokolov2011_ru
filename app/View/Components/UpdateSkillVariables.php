<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UpdateSkillVariables extends Component
{
    public $variables;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($variables)
    {
        $this->variables = $variables;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.update-skill-variables');
    }
}
