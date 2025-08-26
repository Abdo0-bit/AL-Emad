<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Debt;

class Customer extends Model
{
    protected $fillable =['name' , 'phone'];


    
    public function debts()
    {
        return $this->hasMany(Debt::class);
    }

}
