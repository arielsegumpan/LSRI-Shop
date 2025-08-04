<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Models\BlogPost;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class BlogPageSingle extends Component
{

    public BlogPost $post;
    public function mount($post_slug)
    {
       $this->post = BlogPost::postSingle()
       ->byPostSlug($post_slug)
       ->visible()
       ->firstOrFail();
    }


    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.pages.blog-page-single', [
            'post' => $this->post,
        ]);
    }
}
