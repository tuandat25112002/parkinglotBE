<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\Parking;
use App\Models\Prohibited;
use App\Models\User;
use Carbon\Carbon;
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
        $parkings = Parking::orderBy('search_number', 'desc')->paginate(15);
        $users = User::orderBy('updated_at', 'desc')->paginate(5);
        $parkings_all = Parking::orderBy('lat', 'asc')->get();
        foreach ($parkings_all as $parking) {
            $parking->image = json_decode($parking->image);
        }
        $prohibited = Prohibited::orderBy('start_Latitude', 'desc')->get();

        return view('admin.home.dashboard')->with(compact('count_parkings', 'search_number', 'count_users', 'parkings', 'parkings_all', 'prohibited', 'users'));
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
