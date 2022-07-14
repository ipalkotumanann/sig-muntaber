<?php

namespace App\View\Components\Dashboard\Utils\Forms;

use Illuminate\View\Component;

class Create extends Component
{
    public $action;
    public $classes;
    public $files;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($action, $classes = '', $files = false)
    {
        $this->action = $action;
        $this->classes = $classes;
        $this->files = $files;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.utils.forms.create');
    }
}
