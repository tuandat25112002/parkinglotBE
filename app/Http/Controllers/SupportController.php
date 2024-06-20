<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupportRequest;
use App\Models\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supports = Support::with('User')->orderBy('id','desc')->get();
        return view('admin.supports.index')->with(compact('supports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupportRequest $request)
    {
        $lat = number_format($request->lat, $decimals = 47, $dec_point = '.', $thousands_sep = ',');
        $long = number_format($request->long, $decimals = 47, $dec_point = '.', $thousands_sep = ',');
        try {
            $support = Support::create([
                'iduser' => $request->iduser,
                'image' => $request->description,
                'lat' => $lat,
                'phone' => $request->phone,
                'long' => $long,
                'address' => $request->address,
                'description' => $request->description,
                'status' => $request->status,
            ]);
            return response()->json([
                'message' => 'Thêm SOS thành công',
                'data' => $support,
                'status' => 200,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
                'status' => 400,
            ], 400);
        }
    }

    public function updateStatus (Request $request) {
        $id = $request->id;
        $support = Support::find($id);
        try {
            Support::where('id', $support->id)->update(['status' => $request->status]);
            $arr = [
                'status' => 200,
                'message' => 'Cập nhật trạng thái thành công',
            ];

            return response()->json($arr, 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => "Cập nhật thất bại",
                'status' => 400,
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $support = Support::find($id);
        return response()->json([
            $support,
        ], 200);
    }

    public function listSupportForwardUser($iduser) {
        $supports = Support::where('iduser',$iduser)->get();
        return response()->json([
            $supports,
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $support = Support::with('User')->find($id);
        return view('admin.supports.edit')->with(compact('support'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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
        $support = Support::find($id);
        if($support->status != 0) {
            return redirect()->back()->with('status', 'Yêu cầu này không thể xóa! Bạn chỉ có thể xóa yêu cầu đã bị hủy!'); 
        }
        else {
            $support->delete();
            return redirect()->back()->with('status', 'Xóa yêu cầ thành công!'); 
        }
    }
}
