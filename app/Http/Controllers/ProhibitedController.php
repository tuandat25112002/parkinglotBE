<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\Prohibited;
class ProhibitedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Prohibited::paginate(10);
        return view('admin.Prohibited.index')->with(compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.Prohibited.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'Route' => 'required',
            'start_longitude' => 'required',
            'start_Latitude' => 'required',
            'end_longitude' => 'required',
            'end_Latitude' => 'required', // Change to match the column name in the table
        ],
        // Validation messages
        [
            'Route.required' => 'Vui lòng nhập Route vào',
            'start_longitude.required' => 'Vui lòng nhập vào start_longitude',
            'start_Latitude.required' => 'Vui lòng nhập vào start_Latitude',
            'end_longitude.required' => 'Vui lòng nhập vào end_longitude',
            'end_Latitude.required' => 'Vui lòng nhập vào end_Latitude'
        ]);

        $Prohibited = new Prohibited();
        $Prohibited->Route = $data['Route'];
        $Prohibited->start_longitude = $data['start_longitude'];
        $Prohibited->start_Latitude = $data['start_Latitude'];
        $Prohibited->end_longitude = $data['end_longitude'];
        $Prohibited->end_Latitude = $data['end_Latitude'];
        $Prohibited->save();
        return redirect()->back()->with('status', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $Prohibited = Prohibited::find($id);

        // Check if the category exists
        if (!$Prohibited) {
            // Handle if the category is not found (for example, show an error message or redirect)
            return redirect()->route('Prohibited.index')->with('error', 'Prohibited not found.');
        }

        // Return the view and pass the category data to the view
        return view('admin.Prohibited.edit')->with(compact('Prohibited'));
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
          //
          $data = $request->validate([
            'Route'=>'required',
            'start_longitude' =>'required',
            'start_Latitude' =>'required',
            'end_longitude' =>'required',
            'end_Latitude' =>'required',

        ],
        [
          'Route.required' => 'Vui lòng nhập Route vào',
          'start_longitude.required' =>'Vui lòng nhập vào',
          'start_Latitude.required' =>'Vui lòng nhập vào',
          'end_longitude.required' =>'Vui lòng nhập vào',
          'end_Latitude.required' =>'Vui lòng nhập vào'

        ]);

        $Prohibited = new Prohibited();
        $Prohibited->Route=$data['Route'];
        $Prohibited->start_longitude = $data['start_longitude'];
        $Prohibited->start_Latitude = $data['start_Latitude'];
        $Prohibited->end_longitude = $data['end_longitude'];
        $Prohibited->end_Latitude = $data['end_Latitude'];

        $Prohibited->save();
        return redirect()->back()->with('status','Cập nhật thành công');
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
        $Prohibited = Prohibited::find($id);
        $Prohibited->delete();
        return redirect()->back()->with('status','Xóa danh mục thành công');
    }
}
