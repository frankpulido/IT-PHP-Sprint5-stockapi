<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // This was added by me
use Illuminate\Database\Eloquent\Casts\Attribute;  // This was added by me

class Supplier extends Model
{
    use HasFactory;
    protected $table = 'suppliers'; // This was added by me (not really necessary because I used class plural)
    protected $fillable = [ // These are the only attributes that can be mass-assigned by faker
        'supplier_name'
    ];

    // Relationship with Products
    public function products()
    {
        return $this->hasMany(Product::class);
    }    
}