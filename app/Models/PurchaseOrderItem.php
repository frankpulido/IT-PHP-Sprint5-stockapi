<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // This was added by me
use Illuminate\Database\Eloquent\Casts\Attribute;  // This was added by me

class PurchaseOrderItem extends Model
{
    use HasFactory;
    protected $table = 'purchase_orders_items'; // This was added by me (not really necessary because I used class plural)

        // Relationship with PurchaseOrderItems
        public function order()
        {
            return $this->belongsTo(PurchaseOrder::class, 'purchase_order_id');
        }    
}