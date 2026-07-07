<?php

namespace App\Http\Controllers\Api;
use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterRequest $request){
        $user = User::create([
            'name'=> $request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);
        $data = [
            'user'  => new UserResource($user),
            'token' => $user->createToken('api-token')->plainTextToken,
        ];
        return ApiResponse::send(201,true,'انشاء الحساب بنجاح',$data);

    }
    public function login(LoginRequest $request){
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return ApiResponse::send(401, false, 'البيانات غير صحيحة');
        }

        $data = [
            'user'  => new UserResource($user),
            'token' => $user->createToken('api-token')->plainTextToken,
        ];

        return ApiResponse::send(200, true, 'تم تسجيل الدخول بنجاح', $data);

    }
    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();

        return ApiResponse::send(200, true, 'تم تسجيل الخروج بنجاح');

    }
}
