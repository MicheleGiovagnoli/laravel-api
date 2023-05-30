<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    //relazione one to many 
    public function project()
    {
        return $this->hasMany(Project::class);
    }
}
