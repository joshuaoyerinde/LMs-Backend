<?php

namespace App\Http\Controllers\Tutors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseList; 

class CourseListController extends Controller
{
    public function crearteListOfCourse(Request $request){
        return  CourseList::create([
            'course_name' => $request->course
        ]);
    }

    public function getcourseList(){
        return CourseList::all();
    }
}
