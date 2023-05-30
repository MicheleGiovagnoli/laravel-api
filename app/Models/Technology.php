<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Support\Str;

class Technology extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug'
    ];

    //relazione classe project e technology many to many
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    public static function generateSlug(string $title)
    {
        return Str::slug($title, '-');
    }
}
