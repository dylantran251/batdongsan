<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index(){
        $title = 'Đăng kí tài khoản';
        return view('auth.register', compact('title'));
    }

    public function store(Request $request){
        $data = $request->all();
        $validator = Validator::make($data, [           
            'name' => 'nullable',
            'phone' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);
        
        if($validator->fails()){
            return Response::json(['errors' => $validator->errors()], 422);
        }
        $password = Hash::make($data['password']);
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $password,
            'phone' => $data['phone'],
            'role_id' => 1,
        ]);
        return redirect()->route('login')->with('registerSusses', 'Đăng ký tài khoản thành công!');

        // return Response::json(['message' => 'Đăng ký thất bại']);
    }

    
}
