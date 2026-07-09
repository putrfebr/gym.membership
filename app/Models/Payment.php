<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'invoice_id',
        'payment_date',
        'amount',
    ];
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
