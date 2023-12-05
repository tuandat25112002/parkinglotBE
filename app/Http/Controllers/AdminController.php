<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.home.dashboard');
    }

    public function login()
    {
        if (Auth::user()) {
            return redirect()->to('admin/dashboard');
        }

        return view('auth.login');
    }

    public function register()
    {
        if (Auth::user()) {
            return redirect()->to('admin/dashboard');
        }

        return view('auth.register');
    }

    public function checkLogin(LoginRequest $request)
    {
        if (Auth::user()) {
            return redirect()->to('admin/dashboard');
        }
        $user_login = $request->only('email', 'password');
        if (Auth::attempt($user_login)) {
            if (Auth::user()->active == 1) {
                User::where('id', Auth::user()->id)->update(['updated_at' => Carbon::now()]);

                return redirect()->to('admin/dashboard');
            } else {
                Auth::logout();

                return redirect()->back()->with('error', 'Tài khoản của bạn đã bị khóa vui lòng liên hệ với Admin để biết thêm thông tin chi tiết');
            }
        } else {
            return redirect()->back()->with('error', 'Mật khẩu hoặc email không chính xác');
        }
    }

    public function logoutHttp()
    {
        if (Auth::user()) {
            Auth::logout();

            return redirect()->to('login');
        }
    }

    public function create(UserRequest $userRequest)
    {
        try {
            $user = User::create([
                'name' => $userRequest->name,
                'email' => $userRequest->email,
                'phone' => $userRequest->phone,
                'password' => Hash::make($userRequest->password),
                'role' => $userRequest->role,
            ]);

            return response()->json([
                'message' => 'Đã tạo người dùng thành công, hãy xác nhận email của bạn!',
                'data' => $user,
                'status' => 200,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Failed',
                'data' => $th,
                'status' => 400,
            ], 400);
        }

        // }
    }
}
