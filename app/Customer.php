<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use Notifiable;

    protected $guard = 'customer';

    protected $table = 'customers';

    protected $fillable = ['cell_no',  'password'];

    protected $hidden = ['password',  'remember_token'];


}