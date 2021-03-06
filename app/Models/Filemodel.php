<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\Courses;

class Filemodel extends Model
{
    use HasFactory;

    protected $id = 'id';

    protected $table = "course_file_table";
    protected $fillable = [
        'file_name'
    ];
    public function course(){
        return $this->belongTo(Courses::class);
    }
}
