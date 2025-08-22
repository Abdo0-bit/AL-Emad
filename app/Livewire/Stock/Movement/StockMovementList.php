<?php

namespace App\Livewire\Stock\Movement;

use App\Models\StockMovement;
use App\Models\Product;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;

class StockMovementList extends Component
{
    use WithPagination;

    public $search = '';
    public $filterType = '';
    public $filterProduct = '';
    public $filterCategory = '';
    public $filterDateFrom = '';
    public $filterDateTo = '';
    public $perPage = 10;

    protected $queryString = [
        'search' => ['except' => ''],
        'filterType' => ['except' => ''],
        'filterProduct' => ['except' => ''],
        'filterCategory' => ['except' => ''],
        'filterDateFrom' => ['except' => ''],
        'filterDateTo' => ['except' => ''],
        'perPage' => ['except' => 10],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingFilterType()
    {
        $this->resetPage();
    }

    public function updatingFilterProduct()
    {
        $this->resetPage();
    }

    public function updatingFilterCategory()
    {
        $this->resetPage();
        $this->filterProduct = ''; // Reset product filter when category changes
    }

    public function updatingFilterDateFrom()
    {
        $this->resetPage();
    }

    public function updatingFilterDateTo()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function clearFilters()
    {
        $this->reset(['search', 'filterType', 'filterProduct', 'filterCategory', 'filterDateFrom', 'filterDateTo']);
        $this->resetPage();
    }

    public function getFilteredProductsProperty()
    {
        return $this->filterCategory 
            ? Product::where('category_id', $this->filterCategory)->orderBy('name')->get()
            : Product::orderBy('name')->get();
    }

    public function render()
    {
        $movementsQuery = StockMovement::with(['product.category', 'user'])
            ->when($this->search, function ($query) {
                $query->whereHas('product', function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%');
                })
                ->orWhereHas('user', function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%');
                })
                ->orWhere('note', 'like', '%' . $this->search . '%');
            })
            ->when($this->filterType, function ($query) {
                $query->where('type', $this->filterType);
            })
            ->when($this->filterProduct, function ($query) {
                $query->where('product_id', $this->filterProduct);
            })
            ->when($this->filterCategory, function ($query) {
                $query->whereHas('product', function ($q) {
                    $q->where('category_id', $this->filterCategory);
                });
            })
            ->when($this->filterDateFrom, function ($query) {
                $query->whereDate('created_at', '>=', $this->filterDateFrom);
            })
            ->when($this->filterDateTo, function ($query) {
                $query->whereDate('created_at', '<=', $this->filterDateTo);
            })
            ->orderBy('created_at', 'desc');

        $movements = $movementsQuery->paginate($this->perPage);

        // Calculate statistics
        $totalInMovements = StockMovement::where('type', 'in')->sum('quantity');
        $totalOutMovements = StockMovement::where('type', 'out')->sum('quantity');
        $todayMovements = StockMovement::whereDate('created_at', today())->count();

        return view('livewire.stock.movement.stock-movement-list', [
            'movements' => $movements,
            'categories' => Category::orderBy('name')->get(),
            'products' => Product::orderBy('name')->get(),
            'totalInMovements' => $totalInMovements,
            'totalOutMovements' => $totalOutMovements,
            'todayMovements' => $todayMovements,
        ]);
    }
}
