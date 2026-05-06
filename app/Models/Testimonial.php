<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    //
    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'title' => 'array',
            'position' => 'array',
        ];
    }

    public function getTitleTransAttribute()
    {
        return $this->title[app()->getLocale()];
    }
}
