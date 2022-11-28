<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Category;
use App\Models\Discount;
use App\Models\Brand;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource and add the names of FKs.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        if ($product != null) {
            // add all the fks names to columns and img urls
            foreach ($product as $p) {
                $categorys = Category::find($p->category_id);
                $p->category_name = $categorys->category;

                $brands = Brand::find($p->brand_id);
                $p->brand_name = $brands->brand_name;

                $discounts = Discount::find($p->discount_id);
                $p->discount_name = $discounts->discount;

                $img = $p->img;
                if ($img) {
                    $p->image_url = url('/') . "/img/" . $img;
                }
            }
            return $product;
        } else {
            return response()->json([
                'message' => 'No product in the list.'
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
            'name' => 'required|min:2|max:128',
            'img' => 'nullable|image|mimes:jpg,jpeg',
            'price' => 'required|integer|min:1|max:99999',
            'info' => 'required',
            'stock' => 'required|integer',
            'category_id' => 'required',
            'discount_id' => 'required',
            'brand_id' => 'required'
        ]);
        // get all the data from request to check for img
        $data = $request->all();
        // check for img, create new name for the file.
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $ext = $file->getClientOriginalExtension();
            $imgname = Str::random(20) . '.' . $ext;
            $file->move('img/', $imgname);
            $data['img'] = $imgname;
        }
        return Product::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        if ($product != null) {
            return $product;
        } else {
            return response()->json([
                'message' => 'Product not found.'
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
        $product = Product::find($id);
        if ($product != null) {
            // validate data before storing
            $request->validate([
                'name' => 'required|min:2|max:128',
                'price' => 'required|integer|min:1|max:99999',
                'info' => 'required',
                'stock' => 'required|integer',
                'category_id' => 'required',
                'discount_id' => 'required',
                'brand_id' => 'required'
            ]);
            $product->update($request->all());
            return response()->json([
                'message' => 'The product has been updated.'
            ]);
        } else {
            return response()->json([
                'message' =>  'Product not found.'
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
        $product = Product::find($id);
        if ($product != null) {
            // delete img from directory if any
            if ($product->img != null) {
                unlink("img/" . $product->img);
            }
            $product->delete();
            return response()->json([
                'message' => 'The product has been deleted.'
            ]);
        } else {
            return response()->json([
                'message' => 'Product not found.'
            ], 404);
        }
    }

    /**
     * Search the specified resource from storage.
     *
     * @param  int  $name
     * @return \Illuminate\Http\Response
     */
    public function searchProductName($name)
    {
        $search = Product::where('name', 'Like', '%' . $name . '%')->get();
        if ($search != null) {
            foreach ($search as $s) {
                $img = $s->img;
                if ($img) {
                    $s->image_url = url('/') . "/img/" . $img;
                }
            }
            return $search;
        } else {
            return response()->json([
                'message' => 'Product not found.'
            ], 404);
        }
    }

    /**
     * Get all products from specified category.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getProductsByCategory($id)
    {
        $category = Category::find($id);

        if ($category != null) {
            // save all products to variable and go thru foreach and get names for category, brand and discount
            $prod = $category->product;
            foreach ($prod as $p) {
                $categorys = Category::find($p->category_id);
                $p->category_name = $categorys->category;

                $brands = Brand::find($p->brand_id);
                $p->brand_name = $brands->brand_name;

                $discounts = Discount::find($p->discount_id);
                $p->discount_name = $discounts->discount;

                $img = $p->img;
                if ($img) {
                    $p->image_url = url('/') . "/img/" . $img;
                }
            }
            return $prod;
        } else {
            return response()->json([
                'message' => 'Category does not exist.'
            ], 404);
        }
    }
    /**
     * Get all products from specified discunt.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getProductsByDiscount($id)
    {
        $discount = Discount::find($id);

        if ($discount != null) {
            // save all products to variable and go thru foreach and get names for category, brand and discount
            $prod = $discount->product;
            foreach ($prod as $p) {
                $categorys = Category::find($p->category_id);
                $p->category_name = $categorys->category;

                $brands = Brand::find($p->brand_id);
                $p->brand_name = $brands->brand_name;

                $discounts = Discount::find($p->discount_id);
                $p->discount_name = $discounts->discount;

                $img = $p->img;
                if ($img) {
                    $p->image_url = url('/') . "/img/" . $img;
                }
            }
            return $prod;
        } else {
            return response()->json([
                'message' => 'Discount does not exist.'
            ], 404);
        }
    }

    /**
     * Get all products from specified brand.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getProductsByBrand($id)
    {
        $brand = Brand::find($id);

        if ($brand != null) {
            // save all products to variable and go thru foreach and get names for category, brand and discount
            $prod = $brand->product;
            foreach ($prod as $p) {
                $categorys = Category::find($p->category_id);
                $p->category_name = $categorys->category;

                $brands = Brand::find($p->brand_id);
                $p->brand_name = $brands->brand_name;

                $discounts = Discount::find($p->discount_id);
                $p->discount_name = $discounts->discount;

                $img = $p->img;
                if ($img) {
                    $p->image_url = url('/') . "/img/" . $img;
                }
            }
            return $prod;
        } else {
            return response()->json([
                'message' => 'Brand does not exist.'
            ], 404);
        }
    }

    public function calculateAmounts()
    {
        $product = Product::all()->sum('stock');
        if ($product != null) {
            $total = array(
                "total" => $product
            );
            return $total;
        } else {
            return response()->json([
                'message' => 'No products.'
            ], 404);
        }
    }
}
