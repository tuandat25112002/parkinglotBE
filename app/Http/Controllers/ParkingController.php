<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParkingRequest;
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
        try {
            $parkings = Parking::get();

            return response()->json(
                $parkings, 200);
        } catch (\Throwable $th) {
            abort('500');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ParkingRequest $request)
    {
        try {
            $parking = Parking::create([
                'name' => $request->name,
                'address' => $request->address,
                'lat' => $request->lat,
                'long' => $request->long,
                'image' => $request->image,
                'slot' => $request->slot,
                'max' => $request->max,
            ]);

            return response()->json([
                'message' => 'Create Successfully',
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

            return response()->json([
                $parking,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Failed',
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
        //
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
}
