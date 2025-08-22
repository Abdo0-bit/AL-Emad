<?php

namespace App\Livewire\Stock\Product;

use App\Models\Product;
use Livewire\Component;

class ProductList extends Component
{
    public $categoryId;


    public function mount($categoryId = null)
    {
        $this->categoryId = $categoryId;
        
    }


    public function delete($id)
    {
        Product::findOrFail($id)->delete();
        session()->flash('success', 'تم حذف المنتج بنجاح.');
    }


    public function edit($id)
    {
        $this->dispatch('editProduct', $id);
    }


    public function render()
    {

        $query = Product::with('category')
            ->latest();

        if ($this->categoryId) {
            $query->where('category_id', $this->categoryId);
        }

        return view('livewire.stock.product.product-list',[
            'products' => $query->paginate(10),
        ]);
    }
}
