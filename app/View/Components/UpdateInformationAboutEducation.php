<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UpdateInformationAboutEducation extends Component
{
    public $educations;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($educations)
    {
        $this->educations=$educations;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.update-information-about-education');
    }
}
