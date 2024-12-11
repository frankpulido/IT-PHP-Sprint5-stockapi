<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // This was added by me
use Illuminate\Database\Eloquent\Casts\Attribute;  // This was added by me

class Product extends Model
{
    use HasFactory;
    protected $table = 'products'; // This was added by me (not really necessary because I used class plural)

    // Relationship with Supplier
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
}