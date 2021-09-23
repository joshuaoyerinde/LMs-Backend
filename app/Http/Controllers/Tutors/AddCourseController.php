<?php

namespace App\Http\Controllers\Tutors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courses;
use App\Models\ Filemodel;

class AddCourseController extends Controller
{
    public function addCourse(Request $request){
        $id = 2;
        $course = Courses::insertGetId([
            'course_name' => $request->coursename,
            'course_desc' => $request->coursename,
            'admin_id' => $id
        ]);
        // $course = new Courses;
        // $id = 123;
        // $course->course_name = $request->coursename;
        // $course->course_desc = $request->desciption;
        // $course->admin_id = $id;
        // $course->insertGetId();
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
}
