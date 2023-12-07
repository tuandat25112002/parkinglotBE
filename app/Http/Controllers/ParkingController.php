<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParkingRequest;
use App\Http\Requests\ParrkingUpdateRequest;
use App\Models\Parking;
use Illuminate\Http\Request;

class ParkingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $parkings = Parking::get();
            foreach ($parkings as $value) {
                $value->image = json_decode($value->image);
            }

            return response()->json(
                $parkings, 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Failed',
                'status' => 400,
            ], 400);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.parkings.create');
    }

    public function list()
    {
        $parkings = Parking::orderBy('id', 'desc')->get();
        foreach ($parkings as $value) {
            $value->image = json_decode($value->image);
        }

        return view('admin.parkings.index')->with(compact('parkings'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ParkingRequest $request)
    {
        $lat = number_format($request->lat, $decimals = 47, $dec_point = '.', $thousands_sep = ',');
        $long = number_format($request->long, $decimals = 47, $dec_point = '.', $thousands_sep = ',');
        $file_upload = $request->file('image');
        $name_image_array = [];
        foreach ($file_upload as $key => $file) {

            $uploadImage = uploadImage($file);
            array_push($name_image_array, $uploadImage);
        }
        $uploadImage_json = json_encode($name_image_array);
        try {

            $parking = Parking::create([
                'name' => $request->name,
                'address' => $request->address,
                'lat' => $lat,
                'long' => $long,
                'description' => $request->description,
                'image' => $uploadImage_json,
                'slot' => $request->max,
                'max' => $request->max,
            ]);

            return redirect()->back()->with('status', 'Thêm bãi đổ xe thành công!');
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
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
        try {
            $parking = Parking::find($id);
            $parking->image = json_decode($parking->image);

            return response()->json([
                $parking,
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
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
        $parking = Parking::find($id);
        $parking->image = json_decode($parking->image);

        return view('admin.parkings.edit')->with(compact('parking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ParrkingUpdateRequest $request, $id)
    {
        $parking = Parking::find($id);
        $images = json_decode($parking->image);
        if ($request->image_delete) {
            $image_deleted = explode(',', rtrim($request->image_delete, ','));
            if (((count($images) - count($image_deleted)) == 0) && $request->file('image') == null) {
                return redirect()->back()->with('erorr', 'Ảnh của bãi đổ xe không được rỗng');
            } else {
                foreach ($images as $key => $value) {
                    foreach ($image_deleted as $value_delete) {
                        if ($value == $value_delete) {
                            deleteImage($value);
                            array_splice($images, $key, 1);
                        }
                    }
                }
            }
        }
        $lat = number_format($request->lat, $decimals = 47, $dec_point = '.', $thousands_sep = ',');
        $long = number_format($request->long, $decimals = 47, $dec_point = '.', $thousands_sep = ',');
        try {
            if ($request->file('image')) {
                $file_upload = $request->file('image');
                foreach ($file_upload as $key => $file) {

                    $uploadImage = uploadImage($file);
                    array_push($images, $uploadImage);
                }
            }
            $uploadImage_json = json_encode($images);
            $parking->update([
                'name' => $request->name,
                'address' => $request->address,
                'lat' => $lat,
                'long' => $long,
                'description' => $request->description,
                'image' => $uploadImage_json,
                'slot' => $request->max,
                'max' => $request->max,
            ]);

            return redirect()->back()->with('status', 'Cập nhật bãi đổ xe thành công!');
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
                'status' => 400,
            ], 400);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parking = Parking::find($id);
        $images = json_decode($parking->image);
        foreach ($images as $value) {
            deleteImage($value);
        }
        $parking->delete();

        return redirect()->back()->with('status', 'Xóa bãi đổ xe thành công!');
    }

    public function updateSlot(Request $request, $id)
    {
        try {
            $parking = Parking::find($id);
            $parking->update([
                'slot' => $request->slot,
            ]);
            $parking->image = json_decode($parking->image);

            return response()->json([
                'message' => 'Cập nhật thành công',
                'data' => $parking,
                'status' => 200,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
                'status' => 400,
            ], 400);
        }
    }
}
