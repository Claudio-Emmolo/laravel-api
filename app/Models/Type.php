<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = array('name');

    // Function for connect (1-N) Projects table
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
