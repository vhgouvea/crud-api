<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    //protected seria para, apenas as classes filhas usarem esse método, restringindo o acesso.
    protected $fillable = [
        'name',
        'slug',
        'description',
        'price'
    ];
}
