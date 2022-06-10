<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'products_id', 'photo'
    ];

    protected $hidden = [];

    public function product()
    {
        return $this->belongsTo(product::class, 'products_id', 'id');
    }
}
