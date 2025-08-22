<?php

namespace App\Livewire\Stock\Category;

use Livewire\Component;
use App\Models\Category;

class CategoryList extends Component
{
    public function render()
    {
        return view('livewire.stock.category.category-list', [
            'categories' => Category::all(),
        ]);
    }
}
