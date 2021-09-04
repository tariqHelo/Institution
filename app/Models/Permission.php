<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'permissions';

    protected $dates = [
    'created_at',
    'updated_at',
    'deleted_at',
    ];

    protected $fillable = [
    'title',
    'created_at',
    'updated_at',
    'deleted_at',
    ];
}
