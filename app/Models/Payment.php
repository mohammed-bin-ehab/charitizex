<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $guarded = [];

    public function donor()
    {
        return $this->belongsTo(User::class, 'user_id')->withDefault();
    }

    public function campaign()
    {
        return $this->belongsTo(Campaign::class, 'campaign_id')->withDefault();
    }
}
