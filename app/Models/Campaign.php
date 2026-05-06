<?php

namespace App\Models;

use App\Traits\Trans;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Campaign extends Model
{
    use Trans;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class)->withDefault();
    }

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function gallery(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable')
            ->where('type', 'gallery');
    }

    public function donations()
    {
        return $this->hasMany(Payment::class);
    }

    protected function casts(): array
    {
        return [
            'title' => 'array',
            'content' => 'array',
        ];
    }

    public function getRaisedAttribute()
    {
        return $this->donations->sum('amount');
    }
}
