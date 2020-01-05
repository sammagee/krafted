<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Tags\HasTags;

class Project extends Model
{
    use HasTags;

    protected $dates = [
        'completed_at',
    ];

    protected $fillable = [
        'title', 'slug', 'description', 'image_url', 'link', 'completed_at',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
