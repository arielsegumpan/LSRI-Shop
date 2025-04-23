<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Models\BlogPost;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class BlogPageSingle extends Component
{

    #[Layout('layouts.app')]
    public function render()
    {
        $this->getBlogPost();
        return view('livewire.pages.blog-page');
    }
}
