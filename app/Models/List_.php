<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class List_ extends Model
{
    use HasFactory;

    protected $table = 'lists';
    protected $fillable = [
        'name',
        'user_id',
        'shop_id'

    ];
    /**
     * user-lists (1-n) relationship
     */
    public function user() {

        return $this->belongsTo(User::class);
    }

    /*
    * shop-lists (1-n) relationship
    */
    public function shop() {

        return $this->belongsTo(Shop::class);
    }

    /*
    * list-listCategories (1-n) relationship
    */
    public function listCategories() {

        return $this->hasMany(listCategory::class, 'list_id');
    }

    /*
    * list-products (1-n) relationship
    */

    public function products() {

        return $this->hasMany(Product::class, 'list_id');
    }

    
}

