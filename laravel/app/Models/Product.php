<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function category(): BelongsTo //M:1
    {
        return $this->belongsTo(Category::class, 'category_id','id')
        ->select('id', 'name');
    }
}
