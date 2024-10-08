<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    use HasFactory;
    public function category()
    {
        return $this->belongsTo(CategoryModel::class, 'category_id');
    }
    public function billitem()
    {
        return $this->hasMany(BillItem::class);
    }
}
