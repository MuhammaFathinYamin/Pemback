<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Students extends Model
{
    use HasFactory;

    // function getAllStudents(){
    //     $students = DB::select('select * from students');
    //     return $students;
    // }

    protected $fillable = ['nama', 'nim', 'email', 'jurusan'];
}
