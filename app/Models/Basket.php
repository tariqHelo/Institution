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
         'o_qty',
         'price',
         'status',
         'source',
         'file'
    ];

    public function exchange(){
      return $this->hasOne(Exchange::class);
    }

    public function anothor(){
      return $this->hasOne(AnothorExchange::class);
    }
    public function ex()
    { 
     return $this->exchange()->get()->sum("quantity"); //100
    }
    public function as()
    { 
     return $this->anothor()->get()->sum("quantity");
    }
    public function total()
    {
      return $this->ex() + $this->as();// 0 + 100 = 100

    }

}
