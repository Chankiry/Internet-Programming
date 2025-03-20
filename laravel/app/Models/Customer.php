<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'address', 'phone'];

    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class, 'customer_id');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'customer_id');
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class, 'customer_id');
    }

    public function wishlists(): HasMany
    {
        return $this->hasMany(Wishlist::class, 'customer_id');
    }

    public function products(): HasManyThrough
    {
        return $this->hasManyThrough(
            Product::class, // Target model (Product)
            Cart::class,    // Intermediate model (Cart)
            'customer_id',  // Foreign key on the intermediate table (Cart) referencing the parent (Customer)
            'id',           // Primary key of the target model (Product)
            'id',           // Primary key of the parent model (Customer)
            'product_id'    // Foreign key on the intermediate table (Cart) referencing the target (Product)
        );
    }
}