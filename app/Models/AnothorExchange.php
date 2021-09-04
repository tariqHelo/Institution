<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnothorExchange extends Model
{
    use HasFactory;
   // public const CREATED_AT = 'created';
 //   public const UPDATED_AT = 'updated';

    protected $dates = ['created_at'];
    
    protected $fillable= [
    'name',
    'id_number',
    'note',
    'quantity',
    'address',
    'basket_id'
    ];

    public function basket()
    {
        return $this->belongsTo(Basket::class);
    }

}
