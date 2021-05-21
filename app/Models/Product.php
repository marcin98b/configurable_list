<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $fillable = [
        'ticked'

    ];
    /**
     * user-products (1-n) relationship
     */
    public function user() {

        return $this->belongsTo(User::class);
    }

    /**
     * category-products (1-n) relationship
     */
    public function category() {

        return $this->belongsTo(Category::class);
    }


    /**
     * shopCategories - Product (1-n) relationship
     */
    public function shopCategory() {

        return $this->belongsTo(shopCategory::class);
    }


    /**
     * custom_product - products (1-n) relationship
     */

    public function customProduct() {

        return $this->belongsTo(customProduct::class);

    }


    // /**
    //  * listCategories - Product (1-n) relationship
    //  */
    // public function listCategory() {

    //     return $this->belongsTo(listCategory::class);
    // }   


    /*
    * list-products (1-n) relationship
    */

    public function list() {

        return $this->belongsTo(List_::class);
    }

}
