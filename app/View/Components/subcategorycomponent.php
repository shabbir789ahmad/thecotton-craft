<?php

namespace App\View\Components;

use Illuminate\View\Component;

class subcategorycomponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $category;
    public function __construct($category)
    {
        $this->category=$category;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
         $category=$this->category;
         return view('components.subcategorycomponent',compact('category'));
    }
}
