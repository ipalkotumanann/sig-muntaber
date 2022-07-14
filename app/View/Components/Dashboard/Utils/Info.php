<?php

namespace App\View\Components\Dashboard\Utils;

use Illuminate\View\Component;

class Info extends Component
{
    public $classes;
    public $title;
    public $icon;
    public $value;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $classes = '',
        $title,
        $icon,
        $value
    ) {
        $this->classes = $classes;
        $this->title = $title;
        $this->icon = $icon;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.utils.info');
    }
}
