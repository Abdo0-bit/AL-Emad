<?php

namespace App\Livewire\Debt;

use App\Models\Customer;
use App\Models\Debt;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\Attributes\On;

class CustomerDebt extends Component
{
    public Customer $customer;
    public Collection $debts;
    
    // Add new debt properties
    public $showAddDebtForm = false;
    public $items = [
        ['item_name' => '', 'quantity' => 1, 'unit_price' => 0],
    ];

    public function mount(Customer $customer)
    {
        $this->customer = $customer;
        $this->loadDebts();
    }

    #[On('debt-added')]
    public function loadDebts()
    {
        $this->debts = $this->customer->debts()->orderBy('created_at', 'desc')->get();
    }

    public function getTotalDebtProperty()
    {
        return $this->debts->where('status', 'unpaid')->sum('total_price');
    }

    public function getPaidAmountProperty()
    {
        return $this->debts->where('status', 'paid')->sum('total_price');
    }

    public function getTotalTransactionsProperty()
    {
        return $this->debts->count();
    }

    public function getTotalItemsProperty()
    {
        return $this->debts->sum('quantity');
    }

    public function toggleAddDebtForm()
    {
        $this->showAddDebtForm = !$this->showAddDebtForm;
        if (!$this->showAddDebtForm) {
            $this->resetAddDebtForm();
        }
    }

    public function resetAddDebtForm()
    {
        $this->items = [
            ['item_name' => '', 'quantity' => 1, 'unit_price' => 0],
        ];
    }

    public function addItem()
    {
        $this->items[] = ['item_name' => '', 'quantity' => 1, 'unit_price' => 0];
    }

    public function removeItem($index)
    {
        if (count($this->items) > 1) {
            unset($this->items[$index]);
            $this->items = array_values($this->items);
        }
    }

    public function getAddDebtTotalProperty()
    {
        return collect($this->items)->sum(function ($item) {
            return (int) ($item['quantity'] ?? 0) * (float) ($item['unit_price'] ?? 0);
        });
    }

    public function createDebt()
    {
        // التحقق من وجود أصناف
        if (empty($this->items)) {
            session()->flash('error', 'يرجى إضافة صنف واحد على الأقل');
            return;
        }

        // التحقق من صحة بيانات الأصناف
        foreach ($this->items as $item) {
            if (empty($item['item_name']) || $item['quantity'] < 1 || $item['unit_price'] < 0) {
                session()->flash('error', 'يرجى ملء جميع الحقول بشكل صحيح');
                return;
            }
        }

        // إنشاء سجل دين لكل صنف
        foreach ($this->items as $item) {
            Debt::create([
                'customer_id' => $this->customer->id,
                'item_name' => $item['item_name'],
                'quantity' => $item['quantity'],
                'unit_price' => $item['unit_price'],
                'total_price' => $item['quantity'] * $item['unit_price'],
                'status' => 'unpaid',
            ]);
        }

        session()->flash('success', 'تم إضافة الدين بنجاح');
        $this->resetAddDebtForm();
        $this->showAddDebtForm = false;
        $this->loadDebts();
        $this->dispatch('debt-added');
    }

    public function toggleDebtStatus(Debt $debt)
    {
        if ($debt->customer_id === $this->customer->id) {
            $newStatus = $debt->status === 'paid' ? 'unpaid' : 'paid';
            $debt->update([
                'status' => $newStatus,
                'paid_at' => $newStatus === 'paid' ? now() : null,
            ]);
            $this->loadDebts();
        }
    }

    public function deleteDebt(Debt $debt)
    {
        if ($debt->customer_id === $this->customer->id) {
            $debt->delete();
            $this->loadDebts();
        }
    }

    public function deleteAllDebts()
    {
        $this->customer->debts()->delete();
        $this->loadDebts();
    }

    public function deleteCustomer()
    {
        $this->customer->delete();
        return redirect()->route('debts.customers');
    }

    public function render()
    {
        return view('livewire.debt.customer-debt');
    }

}
