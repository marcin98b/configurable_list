<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customProduct extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'name',
        'description',
        'user_id',
        'img_filepath',
        'share_key'

    ];

    
    
    /**
     * user-custom_products (1-n) relationship
     */
    public function user() {

        return $this->belongsTo(User::class);
    }


    /**
     * custom_product - products (1-n) relationship
     */

    public function products() {

        return $this->hasMany(Product::class);

    }


}
