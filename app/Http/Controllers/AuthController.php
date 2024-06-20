<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        try {
            $user = User::where('email', $request->email)->first();
            // print_r($data);
            if (! $user || ! Hash::check($request->password, $user->password)) {
                return response([
                    'message' => ['Email or Password is incorrect!'],
                    'status' => 401,
                ], 404);
            } else {
                $token = $user->createToken('my-app-token')->plainTextToken;
                User::where('id', $user->id)->update(['updated_at' => Carbon::now()]);
                $response = [
                    'message' => 'Login Successfully',
                    'data' => [
                        'user' => $user,
                        'token' => $token,
                    ],
                    'status' => 200,
                ];

                return response($response, 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Failed',
                'data' => 'Email or Password is incorrect!',
                'status' => 400,
            ], 400);
        }
    }

    public function register(UserRequest $userRequest)
    {
        try {
            $user = User::create([
                'name' => $userRequest->name,
                'email' => $userRequest->email,
                'phone' => $userRequest->phone,
                'password' => Hash::make($userRequest->password),
                'role' => 2, // 0 admin, 1 agent, 2 user
            ]);

            return response()->json([
                'message' => 'Create Successfully',
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

    public function logout(Request $request)
    {
        try {
            if ($request->user()) {
                $request->user()->tokens()->delete();

                return response()->json([
                    'message' => 'Logout Successfully',
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Logout Failed',
                ], 400);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Logout Failed',
                'data' => $th->getMessage(),
            ], 400);
        }
    }
}
