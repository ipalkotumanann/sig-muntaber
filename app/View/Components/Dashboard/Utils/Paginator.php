<?php

namespace App\View\Components\Dashboard\Utils;

use Illuminate\View\Component;

class Paginator extends Component
{
    public $paginator;
    public $year;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($paginator, $year = null)
    {
        $this->paginator = $paginator;
        $this->year = $year;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.utils.paginator');
    }
}
