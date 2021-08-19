<?php

namespace App\Models;
use DB;
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
         'status',
         'beneficiarie_id',
         'source'
    ];
    public function exchange(){
      return $this->hasOne(Exchange::class);
    }
    public function total()
    { 
     return $this->exchange()->get()->sum("quantity");
    }
}
