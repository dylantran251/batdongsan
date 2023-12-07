<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log ;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $title = 'Danh sách người dùng';
        return view('admin.pages.users.index', compact('title'));
    }

    public function getItems(Request $request): JsonResponse
    {
        try {
            $limit = $request->limit ?? 40;
            $users = User::orderByDesc('created_at')->paginate($limit);
            return Response::json(['data' => $users], 200);
        }
        catch (Exception $exception)
        {
            return Response::json(['message'=> $exception->getMessage()], 500);
        }
    }

    public function getItem(User $user): JsonResponse
    {
        try {
            return Response::json(['data' => $user], 200);
        }
        catch (Exception $exception)
        {
            return Response::json(['message'=> $exception->getMessage()], 500);
        }
    }

    public function store(Request $request): JsonResponse
    {
        try {
            $data = $request->all();
            $validator = Validator::make($data, [
                'name' => 'required',
                'phone' => 'required',
                'email' => 'unique:users,email|required|email',
                'role_id' => 'required',
                'password' => 'required|confirmed|min:6'
       
            ]);
            if ($validator->fails()) {
                return Response::json(['errors' => $validator->errors()], 422);
            }
            $data['password'] = Hash::make($data['password']);
            User::create($data);     
            return Response::json(['message' => 'Đã thêm người dùng mới!'], 200);           
        } catch (Exception $e) {
            return Response::json(['error' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, User $user): JsonResponse
    {
        try {
            $data = $request->all();
            $validator = Validator::make($data, [
                'name' => 'required',
                'phone' => 'required',
                'role_id' => 'required',
            ]);
            if ($validator->fails()) {
                return Response::json(['errors' => $validator->errors()], 422);
            }
            if(isset($data['password'])){
                unset($data['password']);
            }
            $user->update($data);    
            return Response::json(['message' => 'Đã cập nhật người dùng!'], 200);           
        } catch (Exception $e) {
            return Response::json(['error' => $e->getMessage()], 500);
        }
        
    }

    public function destroy(User $user): JsonResponse
    {
        try {
            $user->delete();
            return Response::json(['message' => 'Đã xóa người dùng này']);
        }catch (Exception $exception)
        {
            return \response()->json(['message'=> $exception->getMessage()], 500);
        }
    }
}
