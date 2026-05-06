<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Trans;

class Slider extends Model
{
    use Trans;

    protected $guarded = [];


    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    protected function casts(): array
    {
        return [
            'title' => 'array',
            'content' => 'array',
            'btn1_text' => 'array',
            'btn2_text' => 'array',
        ];
    }
}
