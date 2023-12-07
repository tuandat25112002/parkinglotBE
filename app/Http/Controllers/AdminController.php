<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\Parking;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $parkings = Parking::orderBy('id', 'desc')->get();
        $users = User::orderBy('id', 'desc')->get();
        $search_number = 0;
        foreach ($parkings as $parking) {
            $search_number += $parking->search_number;
        }
        $count_users = count($users);
        $count_parkings = count($parkings);

        return view('admin.home.dashboard')->with(compact('count_parkings', 'search_number', 'count_users'));
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
            return redirect()->to('admin/dashboard');
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
                'message' => 'Đã đăng ký thành công, hãy xác nhận email của bạn!',
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
