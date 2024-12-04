<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    // Explicitly define the table name
    protected $table = 'donors';

    // Define the fillable properties
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'address',
    ];

    // Define the relationship with donations
    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    // Define the relationship with reviews (the donor is the reviewer)
    public function reviews()
    {
        return $this->hasMany(Review::class, 'reviewer_id');
    }
}


