<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'title' => 'array',
            'content' => 'array',
        ];
    }

    public function getTitleTransAttribute()
    {
        return $this->title[app()->getLocale()];
    }
}
