<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
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
                    'message' => ['These credentials do not match our records.'],
                    'status' => 201,
                ], 404);
            }

            $token = $user->createToken('my-app-token')->plainTextToken;

            $response = [
                'message' => 'Login Successfully',
                'data' => [
                    'user' => $user,
                    'token' => $token,
                ],
                'status' => 200,
            ];

            return response($response, 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Failed',
                'data' => $th->getMessage(),
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
