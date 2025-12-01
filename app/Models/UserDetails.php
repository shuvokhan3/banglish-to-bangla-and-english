<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    use HasFactory;

    protected $table = 'user_details';

    protected $fillable = ['user_id','full_name','location','phone_number'];

    public function user(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->HasOne(User::class);
    }

}
