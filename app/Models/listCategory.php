<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class listCategory extends Model
{
    use HasFactory;

    protected $table = 'list_categories';

    protected $fillable = [
        'name',
        'order_position',
        'list_id'

    ];


    /*
    * list-listCategories (1-n) relationship
    */
    public function list() {

        return $this->belongsTo(List_::class);
    }


    /**
     * shopCategories - Product (1-n) relationship
     */
    public function products() {

        return $this->hasMany(Product::class);
    }



}
