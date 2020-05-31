<?php

namespace App\View\Components;

use Illuminate\View\Component;

class input extends Component
{
    public $type;
    public $name;
    public $placeholder;
    public $title;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $title, $type = 'text', $placeholder = 'enter here..')
    {
        $this->name = $name;
        $this->title = $title;
        $this->type = $type;
        $this->placeholder = $placeholder;
    }



    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.input');
    }
}
