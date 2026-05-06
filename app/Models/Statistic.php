<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    //
    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'title' => 'array',
        ];
    }

    public function getTitleTransAttribute()
    {
        return $this->title[app()->getLocale()];
    }
}
