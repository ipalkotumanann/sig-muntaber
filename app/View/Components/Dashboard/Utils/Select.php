<?php

namespace App\View\Components\Dashboard\Utils;

use Illuminate\View\Component;

class Select extends Component
{
    public $label;
    public $name;
    public $props;
    public $options;
    public $classes;
    public $selected;
    public $id;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $label,
        $name,
        $props,
        $options,
        $classes = 'form-control',
        $selected = null,
        $id = null
    ) {
        $this->label = $label;
        $this->name = $name;
        $this->props = $props;
        $this->options = $options;
        $this->classes = $classes;
        $this->selected = $selected;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.utils.select');
    }
}
