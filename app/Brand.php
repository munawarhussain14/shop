<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = "brand";
    protected $fillable = ['name','active','desc','logo_url'];
}
