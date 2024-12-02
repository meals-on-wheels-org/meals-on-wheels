<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    /** @use HasFactory<\Database\Factories\MemberFactory> */
    use HasFactory;

    protected $fillable =[
        'address',
        'phonenumber',
        'age',
        'dietary_restriction',
        'disease_suffering',
        'disability'
    ];
}
