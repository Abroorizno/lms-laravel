<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'instructor_id',
        'class_id',
        'title',
        'description',
        'file_path',
        'link_path',
    ];

    public function users()
    {

        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function major()
    {
        return $this->belongsTo(Major::class, 'class_id', 'id');
    }
}
