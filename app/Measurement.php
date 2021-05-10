<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{
    protected $table = 'measurements';

    protected $primaryKey = "id";

    protected $fillable = ['unit','abbreviation','active'];
}
