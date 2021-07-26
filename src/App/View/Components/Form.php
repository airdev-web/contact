<?php

namespace Airdev\Contact\App\View\Components;

use Illuminate\View\Component;

class Form extends Component
{
    public $route_name;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($routeName = '#')
    {
        $this->route_name = $routeName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('contact::components.form');
    }
}
