<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $guarded = [];

    public function campaigns()
    {
        return $this->hasMany(Campaign::class);
    }

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
