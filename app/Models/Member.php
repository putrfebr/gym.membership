<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'address',
        'membership_id',
        'join_date',
        'status',
    ];
    public function membership()
    {
        return $this->belongsTo(Membership::class);
    }
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
