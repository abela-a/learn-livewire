<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;

class HelloWorld extends Component
{
    public $name = 'Abela';
    public $loud = false;
    public $greeting = 'Hello';

    public function mount(Request $request, $name)
    {
        $this->name = $request->input('name', $name);
    }

    public function resetName($name = '')
    {
        $this->name = $name;
    }

    public function render()
    {
        return view('livewire.hello-world');
    }
}
