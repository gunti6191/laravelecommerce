<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use DataTables;

class ProductsController extends Controller
{
    function index(Request $request)
    {
        if ($request->ajax()) {
            $prod = Product::with('category')->get();
            return Datatables::of($prod)
                    ->addIndexColumn()
                    ->addColumn('category', function($row){
                        $field = $row->category->name;
                        return $field;
                    })
                    ->addColumn('brand', function($row){
                        $field = $row->brand->name;
                        return $field;
                    })
                    ->addColumn('action', function($row){
                        $btn = '<a href="'.route("products.edit", $row->slug ).'" class="edit btn btn-success btn-sm mx-3"><i class="fas fa-edit"></i></a>
                                <a href="javascript:void(0)" onclick="deleteBtn(`'.$row->slug.'`);" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>';

                        return $btn;
                    })
                    ->rawColumns(['action', 'category', 'brand'])
                    ->make(true);
        }
        return view('ecomProject.products.listProducts');
    }
    function create(){
        $categories = Category::where('status', 'active')->get();
        $brands = Brand::where('status', 'active')->get();
        $data['categories'] = $categories;
        $data['brands'] = $brands;
        return view("ecomProject.products.addProducts",$data);

    }
    function store(Request $request){

        request()->validate([
            'name' => 'required|unique:products',
            'status' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'rating' => 'required',
            'price' => 'required',
            'cost_price' => 'required',
            'is_discount_available' => 'required',
            'discount_price' => 'required',
            'short_description' => 'required',
        ]);
        $product = new Product;
        $product->name=$request->name;
        $product->category_id=$request->category_id;
        $product->brand_id=$request->brand_id;
        $product->status=$request->status;
        $product->rating=$request->rating;
        $product->price=$request->price;
        $product->cost_price=$request->cost_price;
        $product->is_discount_available=$request->is_discount_available;
        $product->discount_price=$request->discount_price;
        $product->short_description=$request->short_description;
        $product->save(); // Row updated in Database table
        return redirect()->route('products.index');
    }
    function edit($slug){
        $product = Product::where('slug', $slug)->first();
        $categories = Category::where('status', 'active')->get();
        $brands = Brand::where('status', 'active')->get();
        $data['product'] = $product;
        $data['categories'] = $categories;
        $data['brands'] = $brands;
        return view('ecomProject.products.editProducts', $data);
    }
    function update(Request $request, $slug){

        request()->validate([
            'name' => 'required',
            'status' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'rating' => 'required',
            'price' => 'required',
            'cost_price' => 'required',
            'is_discount_available' => 'required',
            'discount_price' => 'required',
            'short_description' => 'required',
        ]);

        $product=Product::where("slug","=",$slug)->first();
        $product->name=$request->name;
        $product->category_id=$request->category_id;
        $product->brand_id=$request->brand_id;
        $product->status=$request->status;
        $product->rating=$request->rating;
        $product->price=$request->price;
        $product->cost_price=$request->cost_price;
        $product->is_discount_available=$request->is_discount_available;
        $product->discount_price=$request->discount_price;
        $product->short_description=$request->short_description;
        $product->save(); // Row updated in Database table
        return redirect()->route('products.index');
    }
    function delete($slug){
        $product=Product::where("slug","=",$slug)->first();
        $product->delete();
        return back();
    }
}
