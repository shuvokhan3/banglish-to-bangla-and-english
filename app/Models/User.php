<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable= ['name', 'email', 'email_verified_at', 'password', 'otp'];

    protected $attributes = [
        'otp' => '0',
        'email_verified_at'=>'0'
    ];

    public function conversations(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Conversation::class);
    }




}
