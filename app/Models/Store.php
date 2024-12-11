<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // This was added by me
use Illuminate\Database\Eloquent\Casts\Attribute;  // This was added by me

class Store extends Model
{
    use HasFactory;
    protected $table = 'stores'; // This was added by me (not really necessary because I used class plural)
    protected $fillable = [ // These are the only attributes that can be mass-assigned by faker
        'store_name'
    ];

    // Relationship with Sales
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }    

}