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
         'status'
    ];

    public function total()
    { 
      //  $q = User::select('users*', 'analytics.*', DB::raw('SUM(analytics.revenue) As revenue'))
      //    ->leftJoin('analytics', 'analytics.user_id', '=', 'users.id')
      //    ->get();
      //   //return $this->sum('quantity');

     return DB::table("exchanges")->where('id')->get()->sum("quantity");
      //  return $this->where('basket_id')->sum('quantity');
    }
}
