<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category_id', 'pricing', 'description', 'images'];

    public function category(): BelongsTo //M:1
    {
        return $this->belongsTo(Category::class, 'category_id','id')
        ->select('id', 'name');
    }

    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class, 'product_id');
    }

    public function orderProducts(): HasMany
    {
        return $this->hasMany(OrderProduct::class, 'product_id');
    }

    public function wishlists(): HasMany
    {
        return $this->hasMany(Wishlist::class, 'product_id');
    }
}
