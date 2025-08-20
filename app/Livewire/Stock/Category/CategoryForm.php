<?php

namespace App\Livewire\Stock\Category;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Category;


class CategoryForm extends Component
{
    #[Validate('required|string|max:255')]
    public $name;
    #[Validate('required|string|max:255')]
    public $description;

    public function mount($category = null)
    {
        if ($category) {
            $this->name = $category->name;
            $this->description = $category->description;
        }
    }

    public function save()
    {
        $this->validate();

        Category::create([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        session()->flash('message', 'تمت إضافة الفئة بنجاح.');
        return redirect()->route('stock.categories');
    }



    public function render()
    {
        return view('livewire.stock.category.category-form');
    }
}
