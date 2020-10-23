<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseCourse extends Model
{
    protected $guarded = [];

    public function file()
    {
        return $this->hasMany(File::class, 'id');
    }
}
