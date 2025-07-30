<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\ProductCategory;
use Livewire\Attributes\Layout;

class ProductCategorieArchive extends Component
{
    public ProductCategory $category;

    public function mount($prod_cat_slug)
    {
        $this->category = ProductCategory::forArchive($prod_cat_slug)->firstOrFail();
    }

    #[Layout('layouts.app')]
    #[Title('Shop')]
    public function render()
    {
        return view('livewire.pages.product-categorie-archive', [
            'productCategory' => $this->category,
            'products' => $this->category->products
        ]);
    }
}
