<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $fillable = [
        'name',
        'description',
        'monthly_price',
    ];
    public function members()
{
    return $this->hasMany(Member::class);
}
}

