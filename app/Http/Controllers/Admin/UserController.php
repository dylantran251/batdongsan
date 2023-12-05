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
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('admin.pages.users.index');
    }

    public function getItems(Request $request): JsonResponse
    {
        try {
            $users = User::orderByDesc('id')->paginate(40);
            return Response::json($users, 200);
        }
        catch (Exception $exception)
        {
            return Response::json(['message'=> $exception->getMessage()], 500);
        }
    }

    public function getItem(User $user): JsonResponse
    {
        try {
            return Response::json($user);
        }
        catch (Exception $exception)
        {
            return Response::json(['message'=> $exception->getMessage()], 500);
        }
    }

    public function store(Request $request): JsonResponse
    {
        try {
            if($request->password === $request->input('confirm-password')){
                User::create([
                    'name' => $request->input('full-name'),
                    'email' => $request->email, 
                    'phone' => $request->input('phone-number'),
                    'role_id' => $request->input('role-id'),
                    'password' => Hash::make($request->input('password')),
                ]);     
                return Response::json(['message' => 'User Created!'], 200);           
            } 
        } catch (Exception $exception) {
            return Response::json(['message' => $exception->getMessage()], 500);
        }
    }

    public function update(Request $request, User $user): JsonResponse
    {
        try {
            $data = $request->all();
            if( $request->password == null)
            { 
                unset($data['password']);
            }
            $user->update($data);
            return Response::json(['message' => 'User Updated!'], 200);
        } catch (Exception $exception) {
            return Response::json(['message' => $exception->getMessage()], 500);
        }
        
    }

    public function destroy(User $user): JsonResponse
    {
        try {
            $user->delete();
            return Response::json(['message' => 'User Deleted!']);
        }catch (Exception $exception)
        {
            return \response()->json(['message'=> $exception->getMessage()], 500);
        }
    }
}
