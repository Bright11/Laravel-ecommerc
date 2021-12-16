<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $table = 'products';
    //protected $guarded[];
    protected $fillable =[
        'name',
        'cart_id',
        'price',
        'discount',
        'discription',
        'keywords',
        'image',
    ];
//table relationship
    public function category()
    {
       return $this->belongsTo(category::class, 'cart_id','id');
    }
    
    
}
