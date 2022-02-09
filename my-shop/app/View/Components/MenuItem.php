<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MenuItem extends Component
{
   public $link, $class, $name, $counter;

   /**
    * Create a new component instance.
    *
    * @param $link
    * @param $class
    * @param $name
    * @param $counter
    */
   public function __construct($link="#", $class="fas fa-exclamation-triangle text-danger", $name, $counter='')
   {
      $this->link = $link;
      $this->class = $class;
      $this->name = $name;
      $this->counter = $counter;
   }

   /**
    * Get the view / contents that represent the component.
    *
    * @return \Illuminate\View\View|string
    */
   public function render()
   {
      return view('components.menu-item');
   }
}
