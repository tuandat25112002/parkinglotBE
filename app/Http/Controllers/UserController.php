<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();

        return view('admin.users.index')->with(compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $userRequest)
    {

    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        try {
            $user = auth()->user();

            return response()->json([
                'message' => 'Get User Success',
                'data' => $user,
                'status' => 200,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Failed',
                'data' => $th->getMessage(),
                'status' => 400,
            ], 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $user = User::find($id);

            return response()->json([
                'message' => 'Get User Success',
                'data' => $user,
                'status' => 200,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Failed',
                'data' => $th->getMessage(),
                'status' => 400,
            ], 400);
        }
    }

    public function getUser(Request $request)
    {
        try {
            $user = User::find($request->id);

            return response()->json([
                'message' => 'Get User Success',
                'data' => $user,
                'status' => 200,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Failed',
                'data' => $th->getMessage(),
                'status' => 400,
            ], 400);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function updateActive(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);
        if ($user->active == 0) {
            $request->merge(['active' => 1]);
        } else {
            $request->merge(['active' => 0]);
        }
        User::where('id', $user->id)->update(['active' => $request->active]);
        $arr = [
            'status' => 200,
            'message' => 'Cập nhật trạng thái thành công',
        ];

        return response()->json($arr, 200);
    }

    public function updateRole(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);
        User::where('id', $user->id)->update(['role' => $request->role]);
        $arr = [
            'status' => 200,
            'message' => 'Cập nhật trạng '.$user->name.' thái thành công',
        ];

        return response()->json($arr, 200);
    }
}
