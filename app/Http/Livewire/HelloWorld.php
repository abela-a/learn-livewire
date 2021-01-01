<?php

namespace App\Http\Livewire;

use Livewire\Component;

class HelloWorld extends Component
{
    public $name = 'Abela';
    public $loud = false;
    public $greeting = 'Hello';

    public function resetName($name = '')
    {
        $this->name = $name;
    }

    public function render()
    {
        return view('livewire.hello-world');
    }
}
