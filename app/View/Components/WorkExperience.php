<?php

namespace App\View\Components;

use Illuminate\View\Component;

class WorkExperience extends Component
{
    public $experiences;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($experiences)
    {
        $this->experiences = $experiences;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.work-experience');
    }
}
