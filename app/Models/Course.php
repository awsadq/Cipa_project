<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function trainer() {
        return $this->belongsTo(Trainer::class);
    }

    public function category() {
        return $this->belongsTo(CourseCategory::class, 'course_category_id');
    }

    public function applications() {
        return $this->hasMany(Application::class);
    }

    protected $guarded = []; // или перечисли нужные поля через $fillable

    protected $fillable = [
        'title',
        'description',
        'program',
        'program_file',
        'start_date',
        'end_date',
        'course_category_id',
        'trainer_id',
        'whatsapp_link',
    ];
}
