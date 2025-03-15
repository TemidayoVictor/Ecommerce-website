<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Coupon extends Model
{
    //
    protected $fillable = [
        'code',
        'type',
        'discount',
        'usage_limit',
        'used',
        'expires_at'
    ];

    public function isValid()
    {
        return ($this->usage_limit === null || $this->used < $this->usage_limit) &&
               ($this->expires_at === null || Carbon::now()->lessThan($this->expires_at));
    }
}
