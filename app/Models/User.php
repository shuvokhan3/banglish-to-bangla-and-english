<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable= ['email', 'email_verified_at', 'password', 'otp'];

    protected $attributes = [
        'otp' => '0',
    ];

    public function conversations(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Conversation::class);
    }

    public function UserDetails(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->HasOne(UserDetails::class);
    }

}
