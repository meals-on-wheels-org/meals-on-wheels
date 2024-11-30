<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    // Define the fillable fields for mass assignment
    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'dob', 'address', 'phone_number', 
        'meal_preferences', 'medical_conditions', 'assigned_caregiver_id'
    ];

    /**
     * Define the relationship with the User model (1-to-1).
     * A member belongs to a user (which is the account that registered them).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Define the relationship with the Caregiver model (1-to-1).
     * A member can have an assigned caregiver (another user).
     */
    public function caregiver()
    {
        return $this->belongsTo(User::class, 'assigned_caregiver_id');
    }

    /**
     * Define the relationship with the MealPlan model (1-to-many).
     * A member can have multiple meal plans.
     */
    public function mealPlans()
    {
        return $this->hasMany(MealPlan::class);
    }

    /**
     * Custom Business Logic:
     * Calculate the age of the member based on their date of birth.
     * 
     * @return int
     */
    public function getAgeAttribute()
    {
        return \Carbon\Carbon::parse($this->dob)->age;
    }

    /**
     * Business Logic to update the member's meal preferences.
     * 
     * @param string $mealPreference
     * @return void
     */
    public function updateMealPreferences(string $mealPreference)
    {
        // Check if the preference is valid before updating
        $validPreferences = ['vegetarian', 'vegan', 'gluten-free', 'halal', 'kosher'];
        if (in_array(strtolower($mealPreference), $validPreferences)) {
            $this->meal_preferences = $mealPreference;
            $this->save();
        } else {
            throw new \Exception('Invalid meal preference.');
        }
    }

    /**
     * Business Logic to assign or update caregiver for a member.
     * 
     * @param int $caregiverId
     * @return void
     */
    public function assignCaregiver(int $caregiverId)
    {
        // Ensure the caregiver exists in the users table
        $caregiver = User::find($caregiverId);
        if (!$caregiver || !$caregiver->isCaregiver()) {
            throw new \Exception('Invalid caregiver.');
        }

        $this->assigned_caregiver_id = $caregiverId;
        $this->save();
    }
}

