<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{

    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    //     'nip',
    //     'class_id',
    //     'level_id',
    //     'phone',
    //     'address'
    // ];

    public function major()
    {
        return $this->belongsTo(Major::class, 'class_id', 'id');
    }

    public function levels()
    {
        return $this->belongsTo(Level::class, 'level_id', 'id');
    }
}
