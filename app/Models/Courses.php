<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CourseList;
use App\Models\Filemodel; 


class Courses extends Model
{
    use HasFactory;

    protected $primarykey = 'id';

    protected $table = 'courses_tables';

    // Adding of couses by tutor relationship........
    public function adminRegistrer()
    {
        return $this->belongTo(AdminRegistrationController::class);
    }
    //method belong to the list of course........
    public function courseList()
    {
        return $this->belongTo(CourseList::class);
    }
    // 
    public function courseHistory()
    {
        return $this->hasMany(CourseHistoryController::class);
    }
    // for fie handling.....
    public function courseFile(){
        return $this->hasMany(Filemodel::class,'course_id');
    }
}
