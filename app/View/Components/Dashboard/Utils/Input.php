<?php

namespace App\View\Components\Dashboard\Utils;

use Illuminate\View\Component;

class Input extends Component
{
    public $label;
    public $name;
    public $type;
    public $value;
    public $required;
    public $options;
    public $classes;
    public $helpText;
    public $id;
    public $readonly;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $label,
        $name,
        $type,
        $value = null,
        $required = false,
        $options = null,
        $classes = 'form-control',
        $helpText = null,
        $id = null,
        $readonly = false
    ) {
        $this->label = $label;
        $this->name = $name;
        $this->type = $type;
        $this->value = $value;
        $this->required = $required;
        $this->options = $options;
        $this->classes = $classes;
        $this->helpText = $helpText;
        $this->id = $id;
        $this->readonly = $readonly;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.utils.input');
    }
}
