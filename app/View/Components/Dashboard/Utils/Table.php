<?php

namespace App\View\Components\Dashboard\Utils;

use Illuminate\View\Component;

class Table extends Component
{
    public $model;
    public $headers;
    public $props;
    public $links;
    public $name;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $model,
        $headers,
        $props,
        $links,
        $name = 'Table Name')
    {
        $this->model = $model;
        $this->headers = $headers;
        $this->props = $props;
        $this->links = $links;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.utils.table');
    }
}
