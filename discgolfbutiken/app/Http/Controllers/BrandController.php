<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand = Brand::all();
        if ($brand != null) {
            return $brand;
        } else {
            return response()->json([
                'message' => 'No brands in the list.'
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
            'brand_name' => 'required|min:2|max:128',
            'brand_phone' => 'required|min:10|max:15',
            'brand_email' => 'required|email',
            'brand_contact' => 'required|min:2|max:128'
        ]);

        return Brand::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brand = Brand::find($id);
        if ($brand != null) {
            return $brand;
        } else {
            return response()->json([
                'message' => 'Brand not found.'
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
        $brand = Brand::find($id);
        if ($brand != null) {
            // validate data before storing
            $request->validate([
                'brand_name' => 'required|min:2|max:128',
                'brand_phone' => 'required|min:10|max:15',
                'brand_email' => 'required|email',
                'brand_contact' => 'required|min:2|max:128'
            ]);
            $brand->update($request->all());
            return response()->json([
                'message' => 'The brand has been updated.'
            ]);
        } else {
            return response()->json([
                'message' => 'Brand not found.'
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
        $brand = Brand::find($id);
        if ($brand != null) {
            $brand->delete();
            return response()->json([
                'message' => 'The brand has been deleted.'
            ]);
        } else {
            return response()->json([
                'message' => 'Brand not found.'
            ], 404);
        }
    }
}
