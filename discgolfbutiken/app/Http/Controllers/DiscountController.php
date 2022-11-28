<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discount;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discount = Discount::all();
        if ($discount != null) {
            return $discount;
        } else {
            return response()->json([
                'message' => 'No discount in the list.'
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
        //validate data before storing
        $request->validate([
            'discount' => 'required|integer|between:0,100'
        ]);

        return Discount::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $discount =Discount::find($id);
        if ($discount != null) {
            return $discount;
        } else {
            return response()->json([
                'message' => 'Discount not found.'
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
        $discount = Discount::find($id);
        if ($discount != null) {
           // validate data before storing
            $request->validate([
               'discount' => 'required|integer|between:0,100'
            ]);
            $discount->update($request->all());
            return response()->json([
                'message' => 'The discount has been updated.'
            ]);
        } else {
            return response()->json([
                'message' => 'Discount not found.'
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
        $discount = Discount::find($id);
         if ($discount != null) {
             $discount->delete();
             return response()->json([
                'message' => 'The discount has been deleted.'
             ]);
         } else {
             return response()->json([
                'message' => 'Discount not found.'
             ], 404);
         }
    }
}
