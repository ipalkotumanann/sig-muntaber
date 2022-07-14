<?php

namespace App\View\Components\Home;

use Illuminate\View\Component;

class Blog extends Component
{
    public $blog;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($blog)
    {
        $this->blog = $blog;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.home.blog');
    }
}
