<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseTable extends Model
{
    use HasFactory;

    protected $id = 'id';

    protected $table = "courses_historys";
    
    public function userinfo()
    {
        return $this->belongTo(RegisterController::class);
    }

    // taking a perticular course
    public function couserTaking()
    {
        return $this->belongTo(CoursesController::class);
    }
}
