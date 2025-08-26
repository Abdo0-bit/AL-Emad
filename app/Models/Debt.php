<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

class Debt extends Model
{
    protected $fillable = [
        'customer_id',
        'item_name',
        'quantity',
        'unit_price',
        'total_price',
        'status',

    ];

    protected $casts = [
        'paid_at' => 'datetime',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
