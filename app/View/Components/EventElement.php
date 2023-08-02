<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EventElement extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $poster;
    public $titre;
    public $date;
    public $lieu;
    public $link;
    public function __construct($poster,$titre,$date,$lieu,$link=null)

    {

        $this->poster = $poster;
        $this->titre = $titre;
        $this->date = $date;
        $this->lieu = $lieu;
        if($link!=null){
            $this->link = $link;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.event-element');
    }
}
