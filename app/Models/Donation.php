<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    // Explicitly define the table name
    protected $table = 'donations';

    // Add the $fillable property to specify the attributes that are mass assignable
    protected $fillable = [
        'donor_id', 
        'amount', 
        'payment_method', 
        'payment_status', 
        'transaction_id'
    ];

    public function donor()
    {
        return $this->belongsTo(Donor::class);
    }
}
