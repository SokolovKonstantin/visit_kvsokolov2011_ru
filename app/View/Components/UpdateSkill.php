<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UpdateSkill extends Component
{
    public $skills;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($skills)
    {
        $this->skills=$skills;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.update-skill');
    }
}
