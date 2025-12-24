<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportOtherDebt extends Model
{
    protected $fillable = ['subscription_report_id', 'entity', 'currency', 'amount', 'expiration_days'];

    public function report()
    {
        return $this->belongsTo(SubscriptionReport::class, 'subscription_report_id');
    }
}
