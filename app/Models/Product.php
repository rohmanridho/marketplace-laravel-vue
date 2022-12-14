<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'users_id',
        'categories_id',
        'price',
        'description',
        'slug'
    ];
    protected $hidden = [];

    public function galleries() {
        return $this->hasMany(ProductGallery::class, 'products_id', 'id');
        
        //membiarkan/ mengembalikan data yang sudah terhapus
        //return $this->hasMany(ProductGallery::class, 'products_id', 'id')->withTrashed();
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'users_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id', 'id');
    }


}
