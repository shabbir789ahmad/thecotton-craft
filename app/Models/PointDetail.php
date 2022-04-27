<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointDetail extends Model
{
    use HasFactory;
    protected $fillable=['detail','product_id'];
}
