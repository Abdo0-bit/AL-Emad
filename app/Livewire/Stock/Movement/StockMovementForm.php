<?php

namespace App\Livewire\Stock\Movement;

use App\Models\Product;
use App\Models\Category;
use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\StockMovement;
use Illuminate\Support\Facades\Auth;

class StockMovementForm extends Component
{
    public $selectedCategoryId;
    
    #[Validate('required|exists:products,id')]
    public $productId;
    #[Validate('required|in:in,out')]
    public $type;
    #[Validate('required|integer|min:1')]
    public $quantity;

    public $note;

    public function updatedSelectedCategoryId()
    {
        $this->productId = null; // Reset product selection when category changes
    }

    public function getFilteredProductsProperty()
    {
        return $this->selectedCategoryId 
            ? Product::where('category_id', $this->selectedCategoryId)->orderBy('name')->get()
            : collect();
    }


    public function save()
    {
        $this->validate();
        $product = Product::findOrfail($this->productId);

        if ($this->type === 'out' && $product->quantity < $this->quantity) {
            session()->flash('error', 'الكمية المطلوبة غير متوفرة في المخزون.');
            return;
        }

        $product->quantity = $this->type === 'in'
            ? $product->quantity + $this->quantity
            : $product->quantity - $this->quantity;
        $product->save();

        StockMovement::create([
            'product_id' => $this->productId,
            'type' => $this->type,
            'quantity' => $this->quantity,
            'note' => $this->note,
            'user_id' => Auth::id(),
        ]);
        session()->flash('success', 'تم تسجيل حركة المخزون بنجاح.');
        $this->reset(['productId', 'type', 'quantity', 'note', 'selectedCategoryId']);

    }



    public function render()
    {
        return view('livewire.stock.movement.stock-movement-form',[
            'categories' => Category::orderBy('name')->get(),
        ]);
    }
}
