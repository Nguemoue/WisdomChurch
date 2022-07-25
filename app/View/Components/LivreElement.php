<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LivreElement extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $poster;
    public $link;
    public $title;
     public function __construct($poster,$link,$title)
    {
        //
        $this->poster = $poster;
        $this->link = $link;
        $this->title= $title; 
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.livre-element');
    }
}
