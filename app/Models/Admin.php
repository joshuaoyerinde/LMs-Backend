<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $fillable =[
        'email',
        'password'
    ];

    protected $primarykey = 'id';

    protected $table = 'admin_reg_tables';

    public function courses()
    {
        return $this->hasMany(CoursesController::class);
    }
}
