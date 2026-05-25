<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $fillable = [
        'name','email','phone','service','destination',
        'subject','message','status','source','ip_address',
    ];
}
