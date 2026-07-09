<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'member_id',
        'invoice_number',
        'invoice_date',
        'subtotal',
        'tax',
        'total',
        'status',
    ];
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function payments()
    {
        return $this->hasOne(Payment::class);
    }
}
