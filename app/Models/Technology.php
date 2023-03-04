<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;

    protected $fillable = array('name', 'color_tag');

    // Function for connect Technologies to many Projects
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
