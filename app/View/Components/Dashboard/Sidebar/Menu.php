<?php

namespace App\View\Components\Dashboard\Sidebar;

use Symfony\Component\Routing\Route;
use Illuminate\View\Component;

class Menu extends Component
{
    public $name;
    public $href;
    public $icon;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $href,
        $icon,
        $name
    ) {
        $this->icon = $icon;
        $this->name = $name;
        $this->href = $href;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.sidebar.menu');
    }
}
