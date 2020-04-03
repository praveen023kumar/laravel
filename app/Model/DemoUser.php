<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DemoUser extends Model
{
    //
    protected $table = 'demo_users';

    protected $fillable = [
        'name',
        'email',
        'file',
        'address',
        'zipcode',
        'mobile_number',
        'date',
        'time',
        'created_at',
        'updated_at'
    ];
}
