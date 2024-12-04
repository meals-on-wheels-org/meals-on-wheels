<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FundraisingCampaign extends Model
{
    // Specify the table name explicitly
    protected $table = 'fundraising';

    // Add the $fillable property to specify the attributes that are mass assignable
    protected $fillable = [
        'goal_amount', 
        'funds_raised', 
        'donors', 
        'meals_funded'
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class, 'campaign_id');
    }
}

