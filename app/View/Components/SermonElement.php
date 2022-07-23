<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SermonElement extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $link;
    public $pastor;
    public $poster;
    public $title;
    public $description;
     public function __construct($link,$pastor,$poster,$description,$title)
    {
        $this->link = $link;
        $this->pastor = $pastor;
        $this->poster = $poster;
        $this->description = $description;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sermon-element');
    }
}
