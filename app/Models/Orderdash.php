<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderdash extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function client(){
        return $this->belongsTo(Client::class,'client_id');
    }

    public function products(){
        return $this->belongsToMany(Product::class,'product_order')->withPivot('quantity');
    }
}
