<?php

namespace App\View\Components\Dashboard\Utils;

use Illuminate\View\Component;

class Alert extends Component
{
    public $callback;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($callback)
    {
        $this->callback = $callback;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.utils.alert');
    }
}
