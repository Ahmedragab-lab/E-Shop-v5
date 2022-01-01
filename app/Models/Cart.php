<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function product(){
        return $this->belongsTo(Product::class,'prod_id','id');
    }

    public function getSumAttribute(){
        $sum= $this->prod_qty * $this->product->selling_price ;
        // return number_format($sum,2);
        return $sum;
    }
    public function getTaxAttribute(){
        $tax= $this->prod_qty * $this->product->selling_price * 14/100;
        // return number_format($tax,2);
        return $tax;
    }
}
