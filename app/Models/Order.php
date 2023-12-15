<?php

namespace App\Models;
use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function user()  
    {  
        return $this->belongsTo(User::class, 'user_id', 'id'); 
    } 

    public function product()  
    {  
        return $this->belongsTo(Product::class, 'product_id', 'id'); 
    } 
}