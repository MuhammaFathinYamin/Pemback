<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;

class StudentsController extends Controller
{
    public function index(){
        $students = Students::all();
        // echo json_encode($students);
        $data = [
            'message' => 'Get all students',
            'data' => $students
        ];

        return response()->json($data, 200);
    }

    public function store(Request $request){
        #menangkap data request 
        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ];

        #menggunakan model Students untuk insert data
        $student = Students::create($input);

        $data = [
            'message' => 'Student is created successfully',
            'data' => $student
        ];

        return response()->json($data, 201);
    }

}
