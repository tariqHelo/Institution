<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exchange extends Model
{
    use HasFactory;
     protected $fillable=[
         'name',
         'quantity',
         'note',
         'basket_id'
    ];

    public function basket()
    {
        return $this->belongsTo(Basket::class);
    }
}
