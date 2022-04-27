<?php

namespace App\View\Components;

use Illuminate\View\Component;

class reviewcomponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    protected $detail;
    public function __construct($detail)
    {
        $this->detail=$detail;
   
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {  
         $detail=$this->detail;
       
        return view('components.reviewcomponent',compact('detail'));
    }
}
