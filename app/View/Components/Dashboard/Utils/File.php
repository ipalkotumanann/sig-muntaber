<?php

namespace App\View\Components\Dashboard\Utils;

use Illuminate\View\Component;

class File extends Component
{
    public $accept;
    public $label;
    public $required;
    public $name;
    public $id;
    public $helpText;
    public $value;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $accept = null,
        $label,
        $required = false,
        $name,
        $id = 'inputFile',
        $helpText = null,
        $value = null
    ) {
        $this->accept = $accept;
        $this->label = $label;
        $this->required = $required;
        $this->name = $name;
        $this->id = $id;
        $this->value = $value;
        $this->helpText = $helpText;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.utils.file');
    }
}
