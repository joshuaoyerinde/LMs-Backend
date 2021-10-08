<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\Courses; 
class CourseList extends Model
{
    use HasFactory;

    protected $id = 'id';

    protected $table = 'courses_list';

    protected $fillable = [
        'course_name'
    ];

    public function courses(){
        return $this->hasMany(Courses::class,'coursesListId');
    }
}
