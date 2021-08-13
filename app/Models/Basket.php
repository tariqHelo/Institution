<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;

    const STATUS_ACTIVE = 'active';
    const STATUS_DRAFT = 'draft';
    
    protected $fillable=[
         'name',
         'quantity',
         'price',
         'status'
    ];

    public function total()
    {
        return $this->sum('quantity');
    }
}
