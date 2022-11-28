<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        if ($category != null) {
            return $category;
        } else {
            return response()->json([
                'message' => 'No category in the list.'
            ], 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // validate data before storing
         $request->validate([
            'category' => 'required|min:2|max:128'
        ]);

        return Category::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        if ($category != null) {
            return $category;
        } else {
            return response()->json([
                'message' => 'Category not found.'
            ], 404);
        }
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
        $category = Category::find($id);
        if ($category != null) {
            // validate data before storing
            $request->validate([
                'category' => 'required|min:2|max:128'
            ]);
            $category->update($request->all());
            return response()->json([
                'message' => 'The category has been updated.'
            ]);
        } else {
            return response()->json([
                'message' => 'Category not found.'
            ], 404);
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
        $category = Category::find($id);
        if ($category != null) {
            $category->delete();
            return response()->json([
                'message' => 'The category has been deleted.'
            ]);
        } else {
            return response()->json([
                'message' => 'Category not found.'
            ], 404);
        }
    }
}
