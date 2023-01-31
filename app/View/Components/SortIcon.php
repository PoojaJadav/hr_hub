<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SortIcon extends Component
{
    public $field;
    public $sortDirection;
    public $sortField;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($field,$sortField,$sortDirection)
    {
        $this->field = $field;
        $this->sortField = $sortField;
        $this->sortDirection = $sortDirection;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sort-icon');
    }
}
