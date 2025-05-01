<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\Attributes\Layout;

class HomePage extends Component
{

    public function mount(){
        return;
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.pages.home-page');
    }
}
