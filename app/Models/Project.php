<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'thumbnail',
        'description',
        'url'
    ];

    public function tags()
    {
        return $this->hasManyThrough(Tag::class, ProjectTag::class, 'project_id', 'id', 'id', 'tag_id');
    }
}