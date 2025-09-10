<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    use HasFactory;
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $prefix = env('PRODUCT_PREFIX', 'PRD');

            // last custom_id nikaalna
            $lastProduct = self::latest('id')->first();

            if ($lastProduct && $lastProduct->custom_id) {
                preg_match('/-(\d+)-/', $lastProduct->custom_id, $matches);
                $seq = isset($matches[1]) ? intval($matches[1]) + 1 : 1000;
            } else {
                $seq = 1000;
            }

            // auto increment wali DB id abhi generate nahi hui
            // is liye pehle ek dummy set kar do, baad me update hoga
            $model->custom_id = $prefix . '-' . $seq . '-TEMP';
        });

        static::created(function ($model) {
            $prefix = env('PRODUCT_PREFIX', 'PRD');

            // sequence ko dobara nikaalna
            preg_match('/-(\d+)-/', $model->custom_id, $matches);
            $seq = $matches[1] ?? 1000;

            // ab hmare paas $model->id (DB auto increment) available hai
            $model->custom_id = $prefix . '-' . $seq . '-' . $model->id;
            $model->save();
        });
    }

    public function category()
    {
        return $this->belongsTo(CategoryModel::class, 'category_id');
    }
    public function billitem()
    {
        return $this->hasMany(BillItem::class);
    }
}
