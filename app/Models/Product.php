<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';   

    protected $fillable = [
        'category_id','name', 'description', 'price',
    ];
    public function category()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'product_sizes')
                    ->withPivot('quantity_available')
                    ->withTimestamps();
    }
    public function parentProduct()
    {
        return $this->belongsTo(Product::class, 'parent_id');
    }
    public function variants()
    {
        return $this->hasMany(Product::class, 'parent_id');
    }
    public function isVariant()
    {

        return $this->parent_id !== null;
    }
}
