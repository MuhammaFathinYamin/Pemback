<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function register(Request $request){

        // $inputValidate = $request->validate([
        //     'name' => 'required',
        //     'email' => 'email|required',
        //     'password' => 'password|required'
        // ]);

        $input = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];

        #insert data ke table user
        $user = User::create($input);

        if ($user){}

        $data = [
            'message' => 'user created successfully'
        ];

        return response()->json($data, 200);
    }
    
    public function login(Request $request){
        $input = [
            'email' => $request->email,
            'password' => $request->password
        ];

        User::where('email', $input['email'])->first();

        if ($input['email'] == $user->email && Hash::check($input['password'], $user->password)){
            $token = $user->ceateToken('auth_token');
        }
    }
}
