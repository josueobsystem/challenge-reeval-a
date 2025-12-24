<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportLoan extends Model
{
    protected $fillable = ['subscription_report_id', 'bank', 'status', 'currency', 'amount', 'expiration_days'];

    public function report()
    {
        return $this->belongsTo(SubscriptionReport::class, 'subscription_report_id');
    }
}
