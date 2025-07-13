<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = ['name'];

    public function issues()
    {
        return $this->hasMany(Issue::class);
    }
    
}
