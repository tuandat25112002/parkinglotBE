<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = categories::paginate(10);

        return view('admin.categories.index')->with(compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'name' => 'required',

            'status' => 'required',

        ],
            [
                'status.required' => 'Vui lòng status vào',
                'name.required' => 'Vui lòng thể loại vào',
            ]);
        $category = new categories();
        $category->name = $data['name'];
        $category->status = $data['status'];
        $category->created_at = time();
        $category->updated_at = time();
        $category->save();

        return redirect()->back()->with('status', 'Thêm danh mục thành công');
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
        // Find the category in the database by ID
        $category = Categories::find($id);

        // Check if the category exists
        if (! $category) {
            // Handle if the category is not found (for example, show an error message or redirect)
            return redirect()->route('categories.index')->with('error', 'Category not found.');
        }

        // Return the view and pass the category data to the view
        return view('admin.categories.edit')->with(compact('category'));
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
        $data = $request->validate([
            'name' => 'required',
            'status' => 'required',
        ],
            [
                'status.required' => 'Vui lòng status vào',
                'name.required' => 'Vui lòng thể loại vào',
            ]);
        $category = Categories::find($id);
        $category->name = $data['name'];

        $category->updated_at = time();
        $category->save();

        return redirect()->back()->with('status', 'Cập nhật danh mục thành công');
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
        $category = Categories::find($id);
        $category->delete();

        return redirect()->back()->with('status', 'Xóa danh mục thành công');
    }

    public function updateActive(Request $request)
    {
        $category = Categories::find($request->id);

        if (! $category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        // Update the active status (assuming 'active' is the column name)
        $category->active = ! $category->active; // Toggle active status
        $category->save();

        return response()->json(['message' => 'Category status updated successfully'], 200);
    }
}
