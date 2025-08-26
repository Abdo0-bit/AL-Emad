<?php

namespace App\Livewire\Debt;

use App\Models\Customer;
use App\Models\Debt;
use Livewire\Component;
use Livewire\WithPagination;

class DebtList extends Component
{
    use WithPagination;
    
    public $customer_id;
    public $search = '';
    public $debts = [];
    public $total_debt = 0;


    public function mount($customer_id = null)
    {
        $this->customer_id = $customer_id;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $customersQuery = Customer::with('debts')->withSum('debts', 'total_price');
        
        if (!empty($this->search)) {
            $customersQuery->where(function($query) {
                $query->where('name', 'like', "%{$this->search}%")
                      ->orWhere('phone', 'like', "%{$this->search}%");
            });
        }
        
        return view('livewire.debt.debt-list', [
            'customers' => $customersQuery->paginate(10)
        ]);
    }
}
