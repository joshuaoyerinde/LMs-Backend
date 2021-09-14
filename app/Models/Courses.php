<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function courseHistory()
    {
        return $this->hasMany(CourseHistoryController::class);
    }
}
