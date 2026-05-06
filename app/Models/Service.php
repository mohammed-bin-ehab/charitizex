<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Trans;


class Service extends Model
{
    use Trans;

    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'title' => 'array',
            'content' => 'array',
        ];
    }
}
