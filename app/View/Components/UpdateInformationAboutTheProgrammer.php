<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UpdateInformationAboutTheProgrammer extends Component
{
    public $programmers;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($programmers)
    {
        $this->programmers = $programmers;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.update-information-about-the-programmer');
    }
}
