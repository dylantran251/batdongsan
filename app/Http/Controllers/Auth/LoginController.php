<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator ;
use PhpParser\Node\Stmt\Return_;
use Yoeunes\Toastr\Facades\Toastr;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();            
            return $this->roleLogin(Auth()->user());
        }
        return back()->withErrors([
            'message' => 'Thông tin đăng nhập không chính xác.',
        ])->onlyInput('email');
    }

    protected function roleLogin($user){
        if(Auth()->user()->role_id == 99){
            toastr()->success('Chào mừng bạn đến với giao diện quản trị', 'Thông báo');
            return redirect()->route('admin.dashboard');
        }
        else{
            toastr()->success('Đăng nhập thành công', 'Thông báo');
            return redirect()->route('home');
        }
    }

    public function changePasswordView(){
        return view('auth.change_password');
    }

    public function changePasswordStore(Request $request){
        $validator = Validator::make($request->all(), [
            'old-password' => 'required', 
            'new-password' => 'required|min:6|confirmed',
        ]);
        $data = $request->all();
        if(!Hash::check($data['old-password'], Auth::user()->password)){
            return Response::json(['message' => 'Mật khẩu không đúng'], 400);
        }else if($validator->fails()){
            return Response::json(['errors' => $validator->errors()], 422);
        }
        $password = Hash::make($data['new-password']);
        $user = User::where('id', Auth::user()->id)->first();
        $user->update([
            'password' => $password
        ]);
        toastr()->success('Thay đổi mật khẩu thành công');
        return redirect()->route('home')->with(['Thành công' => ' Thay đổi mẩ khẩu thành công']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();

        toastr()->success('Đã đăng xuất.', 'Thông báo');
        return redirect()->route('home');
    }
}
