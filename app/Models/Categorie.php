<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;



    use HasFactory;

    protected $table = 'categories';   

    protected $fillable = [
        'name', 'description', 'img_path',
    ];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

