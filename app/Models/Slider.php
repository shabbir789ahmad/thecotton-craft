<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $fillable=['image','category_id','tag','heading','detail'];

    public static function sliders()
    {
        return Slider::latest()->get();
    }
}
