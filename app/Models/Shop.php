<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'user_id'

    ];

    //user-shops (1-n) relationship
    public function user() {
        return $this->belongsTo(User::class);
    }

    //shop-lists (1-n) relationship
    public function lists() {
        return $this->hasMany(List_::class);
    }

    //shop - shopCategories (1-n) relationship
    public function shopCategories() {
        return $this->hasMany(shopCategory::class);
    }

}
