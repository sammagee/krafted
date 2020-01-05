<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
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

    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }
}
