<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exchange extends Model
{
    use HasFactory;
     protected $fillable=[
        'beneficiarie_id',
         'quantity',
         'note',
         'basket_id'
    ];

    public function beneficiarie()
    {
        return $this->belongsTo(Beneficiaries::class);
    }

    public function basket()
    {
        return $this->belongsTo(Basket::class);
    }
}
