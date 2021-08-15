<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repository extends Model
{
    use HasFactory;

    protected $fillable=[
         'name',
    ];

    public function baskets()
    {
       return $this->belongsToMany(Basket::class);
    }

//    public function count()
//     { 
//         return $this->where('basket_id')->count();

//     }
}
