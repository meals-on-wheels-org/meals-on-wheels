<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    // Explicitly define the table name
    protected $table = 'reviews';

    // Define the fillable properties
    protected $fillable = [
        'reviewer_id',
        'campaign_id',
        'rating',
        'comment',
    ];

    // Define the relationship with the Donor (the reviewer)
    public function donor()
    {
        return $this->belongsTo(Donor::class, 'reviewer_id');
    }

    // Define the relationship with the FundraisingCampaign (if campaign_id exists in the table)
    public function campaign()
    {
        return $this->belongsTo(FundraisingCampaign::class, 'campaign_id');
    }
}

