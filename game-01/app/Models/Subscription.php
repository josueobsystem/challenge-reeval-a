<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SubscriptionReport;

class Subscription extends Model
{
    protected $fillable = ['full_name', 'document', 'email', 'phone'];

    public function reports()
    {
        return $this->hasMany(SubscriptionReport::class);
    }
}
