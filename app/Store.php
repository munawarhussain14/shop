<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = "store";

    protected $fillable = ['name','active'];
}
