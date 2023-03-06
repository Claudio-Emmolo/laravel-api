<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Role extends Model
{
    use HasFactory;

    protected $fillable = array('level', 'name');

    // Function for connect Roles table to many Projects
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
