<?php

namespace App\Livewire\Debt;

use Livewire\Component;
use App\Models\Customer;
use App\Models\Debt;

class DebtManage extends Component
{
    public $customer_id;
    public $customer ;

    public $search = '';


    // اضافة عميل جديد
    public $name;
    public $phone;

    // اضافة دين جديد

    public $items = [
        ['item_name' => '', 'quantity' => 1, 'unit_price' => 0],
    ];

    
    public function createCustomer()
    {
        $this->validate([
            'name'  => 'required|string|max:255',
            'phone' => 'nullable|string|max:255',
        ]);

        try {
            // التحقق من وجود عميل بنفس رقم الهاتف
            if ($this->phone && Customer::where('phone', $this->phone)->exists()) {
                session()->flash('error', 'رقم الهاتف مستخدم من قبل عميل آخر');
                return;
            }

            $this->customer = Customer::create([
                'name' => $this->name,
                'phone' => $this->phone,
            ]);
            
            $this->customer_id = $this->customer->id;
            session()->flash('success', 'تم إضافة العميل بنجاح');
            $this->reset(['name', 'phone']);

        } catch (\Illuminate\Database\QueryException $e) {
            // التعامل مع خطأ تكرار رقم الهاتف
            if ($e->errorInfo[1] == 1062) { // Duplicate entry error code
                session()->flash('error', 'رقم الهاتف مستخدم من قبل عميل آخر');
            } else {
                session()->flash('error', 'حدث خطأ أثناء إضافة العميل. يرجى المحاولة مرة أخرى');
            }
        } catch (\Exception $e) {
            session()->flash('error', 'حدث خطأ غير متوقع. يرجى المحاولة مرة أخرى');
        }
    }

    public function addItem()
    {
        $this->items[] = ['item_name' => '', 'quantity' => 1, 'unit_price' => 0];
    }

    public function removeItem($index)
    {
        unset($this->items[$index]);
        $this->items = array_values($this->items);
    }

    public function createDebt()
    {
        // التحقق من اختيار العميل
        if (empty($this->customer_id)) {
            session()->flash('error', 'يرجى اختيار العميل أولاً');
            return;
        }

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
                'customer_id' => $this->customer_id,
                'item_name' => $item['item_name'],
                'quantity' => $item['quantity'],
                'unit_price' => $item['unit_price'],
                'total_price' => $item['quantity'] * $item['unit_price'],
                'status' => 'unpaid',
            ]);
        }

        session()->flash('success', 'تم تسجيل العملية بنجاح');
        $this->items = [
            ['item_name' => '', 'quantity' => 1, 'unit_price' => 0],
        ];
        $this->customer_id = null;
    }



    public function getTotalProperty()
    {
        return collect($this->items)->sum(function ($item) {
            return (int) ($item['quantity'] ?? 0) * (float) ($item['unit_price'] ?? 0);
        });
    }

    public function render()
    {
        return view('livewire.debt.debt-manage',[
            'customers' => Customer::where('name','like' , "%{$this->search}%")
            ->orWhere('phone','like' , "%{$this->search}%")
            ->get(),
        ]);
    }
}
