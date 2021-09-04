<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiaries extends Model
{
    use HasFactory;
    protected $fillable=[
          'file_no'  ,
           'name'    ,
           'calss'   ,
           'id_number',
           'phone'   ,
           'area'    ,
    ];

}
