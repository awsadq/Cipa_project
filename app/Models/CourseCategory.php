<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseCategory extends Model
{
    public function courses() {
        return $this->hasMany(Course::class);
    }

    protected $guarded = []; // или перечисли нужные поля через $fillable

}
