<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leader extends Model
{
    protected $fillable = [
        'fullName',
        'email',
        'email_verified_at',
        'whatsappNumber',
        'lineID',
        'github',
        'birthPlace',
        'dob',
        'cv',
        'flazzCard',
        'idCard',
        'groupId'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
