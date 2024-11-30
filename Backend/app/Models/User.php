<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Define the roles for users (you can define this in the user table)
    const ROLE_ADMIN = 'admin';
    const ROLE_MEMBER = 'member';
    const ROLE_CAREGIVER = 'caregiver';
    const ROLE_VOLUNTEER = 'volunteer';

    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    // Relationships
    public function member()
    {
        return $this->hasOne(Member::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}

