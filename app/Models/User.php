<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * user-shops (1-n) relationship
     */
    public function shops() {
        return $this->hasMany(Shop::class);
    }

    
    /**
     * user-categories (1-n) relationship
     */
    public function categories() {

        return $this->hasMany(Category::class);
    }

    /**
     * user-lists (1-n) relationship
     */
    public function lists() {

        return $this->hasMany(List_::class);
    }


    /**
     * user-products (1-n) relationship
     */
    public function products() {

        return $this->hasMany(Product::class);
    }


    /**
     * user-custom_products (1-n) relationship
     */
    public function customProducts() {

        return $this->hasMany(customProduct::class);
    }

}
