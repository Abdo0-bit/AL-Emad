<?php

namespace App\Livewire\Stock\Product;

use App\Models\Product;
use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\Category;

class ProductForm extends Component
{
    #[Validate('required|string|max:255')]
    public $name;
    #[Validate('required|numeric|min:1')]
    public $cost_price;
    #[Validate('required|numeric|min:1')]
    public $selling_price;
    #[Validate('required|integer|min:1')]
    public $quantity;
    #[Validate('required|string|max:50')]
    public $unit;
    #[Validate('required|exists:categories,id')]
    public $category_id ;
    public $productId;


    public function mount($product = null)
    {
        if ($product) {
            $this->productId = $product->id;
            $this->name = $product->name;
            $this->cost_price = $product->cost_price;
            $this->selling_price = $product->selling_price;
            $this->quantity = $product->quantity;
            $this->unit = $product->unit;
            $this->category_id = $product->category_id;
        }
    }

    protected $listeners = ['editProduct' => 'edit'];

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $this->productId = $product->id;
        $this->name = $product->name;
        $this->cost_price = $product->cost_price;
        $this->selling_price = $product->selling_price;
        $this->quantity = $product->quantity;
        $this->unit = $product->unit;
        $this->category_id = $product->category_id;
    }

    public function save()
    {
        $this->validate();
        if($this->productId){

            Product::find($this->productId)->update([
                'name' => $this->name,
                'cost_price' => $this->cost_price,
                'selling_price' => $this->selling_price,
                'quantity' => $this->quantity,
                'unit' => $this->unit,
                'category_id' => $this->category_id ,
            ]);
            session()->flash('success', 'تمت تحديث المنتج بنجاح.');

            $this->reset();

        }else {
            Product::create([
                'name' => $this->name,
                'cost_price' => $this->cost_price,
                'selling_price' => $this->selling_price,
                'quantity' => $this->quantity,
                'unit' => $this->unit,
                'category_id' => $this->category_id ,
            ]);
            session()->flash('success', 'تمت إضافة المنتج بنجاح.');

            $this->reset();
        }
    }
    


    public function render()
    {
        return view('livewire.stock.product.product-form',
        [
            'categories' => Category::all(),
        ]
        );
    }
}
