<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // This was added by me
use Illuminate\Database\Eloquent\Casts\Attribute;  // This was added by me

class SaleItem extends Model
{
    use HasFactory;
    protected $table = 'purchase_orders_items'; // This was added by me (not really necessary because I used class plural)

        // Relationship with Sale
        public function sale()
        {
            return $this->belongsTo(Sale::class, 'order_id');
        }    
}