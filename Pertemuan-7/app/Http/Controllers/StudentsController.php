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
        #menangkap data request dan validasi
        $validateData = $request->validate([
            'nama' => 'required',
            'nim' => 'numeric|required',
            'email' => 'email|required',
            'jurusan' => 'required'
         ]);


        #menggunakan model Students untuk insert data
        $student = Students::create($validateData);

        $data = [
            'message' => 'Student is created successfully',
            'data' => $student
        ];

        return response()->json($data, 201);
    }

    public function show($id){
        $student = Students::find($id);

        if ($student){
            $data = [ 
                'message' => 'Get detail student',
                'data' => $student
            ];
    
            return response()->json($data, 200);
        } else {
            $data = [ 
                'message' => 'Data not found'
            ];
    
            return response()->json($data, 404 );
        }
        
        
    }

    public function update(Request $request, $id){
        $student = Students::find($id);

        if ($student) {
            $input = [
            'nama' => $request->nama ?? $student->nama,
            'nim' => $request->nim ?? $student-> nim,
            'email' => $request->email ?? $student->email,
            'jurusan' => $request->jurusan ?? $student->jurusan
            ];

            $student->update($input);
    
            $data = [
                'message' => 'Student is updated',
                'data' => $student
            ];

            return response()->json($data, 200,);
        } else {
            $data = [
                'message ' => 'Student not found' 
            ];

            return response()->json($data, 404);
        }
    }

    public function destroy($id){
        $student = Students::find($id);
        
        
        if ($student){
            $student->delete();

            $data = [
                'message' => 'Student is deleted'
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Student not found'
            ];

            return response()->json($data, 404);
        }

    }
}
