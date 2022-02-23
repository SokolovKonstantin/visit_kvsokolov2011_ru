<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProfessionalInterests extends Component
{
    public $interests;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($interests)
    {
        $this->interests = $interests;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.professional-interests');
    }
}
