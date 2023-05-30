<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'slug',
        'type_id'
    ];
    public static function generateSlug(string $title)
    {
        return Str::slug($title, '-');
    }

    //relazione one to many 
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    //relazione classe project e technology many to many
    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }
}
