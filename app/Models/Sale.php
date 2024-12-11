<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // This was added by me
use Illuminate\Database\Eloquent\Casts\Attribute;  // This was added by me

class Sale extends Model
{
    use HasFactory;
    protected $table = 'stores_sales'; // This was added by me (not really necessary because I used class plural)

    // Relationship with Products
    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }

    // Relationship with SaleItems
    public function items()
    {
        return $this->hasMany(SaleItem::class);
    }    
}