<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shopCategory extends Model
{

    protected $fillable = [
        'name',
        'order_position',
        'shop_id'

    ];

    use HasFactory;

    /**
     * shop - shopCategories (1-n) relationship
     */
    public function shop() {

        return $this->belongsTo(Shop::class);
    }


    /**
     * shopCategories - Product (1-n) relationship
     */
    public function products() {

        return $this->hasMany(Product::class);
    }


}
