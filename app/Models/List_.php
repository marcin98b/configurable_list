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
        'shop_id',
        'share_key'

    ];

    //user-lists (1-n) relationship
    public function user() {

        return $this->belongsTo(User::class);
    }

    //shop-lists (1-n) relationship
    public function shop() {

        return $this->belongsTo(Shop::class);
    }

    //user-products (1-n) relationship
    public function products() {

        return $this->hasMany(Product::class, 'list_id');
    }

}

