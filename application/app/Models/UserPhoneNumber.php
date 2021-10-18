<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPhoneNumber extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'userId',
        'phoneNumber',
    ];

    /**
     * name of table
     */
    protected $table = 'user_phonenumbers';

    /**
     * BelongsTo relation between User and PhoneNumbers
     */
    public function users()
    {
        $this->belongsTo(User::class, 'userId', 'userId');
    }
}
