<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;

    // Function for connect Technologies to many Projects
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
