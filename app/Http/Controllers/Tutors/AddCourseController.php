<?php

namespace App\Http\Controllers\Tutors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courses;
use App\Models\ Filemodel;

class AddCourseController extends Controller
{
    public function addCourse(Request $request){
        $id = 3;
        $course = Courses::insertGetId([
            'coursesListId' => $request->courseListid,
            'course_desc' => $request->desciption,
            'admin_id' => $id
        ]);
        if ($course) {            
            # code...
            $fileName = $request->file('file_upload')->getClientOriginalName();
            // $fileName = pathinfo($filename, PATHINFO_EXTENSION);
            $filePath = $request->file_upload->storeAs('vidoes', $fileName, 'public');
            $courseFIle = FileModel::insertGetId([
                'file_name'=> $fileName,
                'course_id'=> $course
            ]);
            // $upload->save();
            return response()->json(['sucesss'=>'Upload successfully']);
        }
    }
    public function getCourses(){
        return Courses::with('courseFile')->get();
        // return Courses::join('course_file_table','course_file_table.course_id','=', 'courses_tables.id')
        //                     ->join('admin_reg_tables','admin_reg_tables.id', '=', 'courses_tables.admin_id')
        //                     ->where('courses_tables.admin_id',2,)
        //                     ->get(['courses_tables.*','course_file_table.*']);
    }
}
