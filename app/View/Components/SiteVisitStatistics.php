<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SiteVisitStatistics extends Component
{
    public $statistics;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($statistics)
    {
      $this->statistics = $statistics;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.site-visit-statistics');
    }
}
