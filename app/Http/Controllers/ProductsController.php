<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use DataTables;

class ProductsController extends Controller
{
    function index(Request $request)
    {
        if ($request->ajax()) {

            $prod = Product::latest()->get();
            return Datatables::of($prod)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="'.route("products.edit", $row->slug ).'" class="edit btn btn-success btn-sm mx-3">Edit</a>
                                <a href="javascript:void(0)" onclick="deleteBtn('.$row->id.');" class="delete btn btn-danger btn-sm">Delete</a>';

                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('ecomProject.products.listProducts');
    }
    function create(){
        return view("ecomProject.products.addProducts");
    }
    function store(Request $request){

        request()->validate([
            'name' => 'required|unique:products',
            'status' => 'required',
            'rating' => 'required',
            'price' => 'required',
            'cost_price' => 'required',
            'is_discount_available' => 'required',
            'discount_price' => 'required',
            'short_description' => 'required',
        ]);
        $product = new Product;
        $product->name=$request->name;
        $product->slug=$request->name;
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
        $data['product'] = $product;
        return view('ecomProject.products.editProducts', $data);
    }
    function update(Request $request, $slug){

        request()->validate([
            'name' => 'required',
            'status' => 'required',
            'rating' => 'required',
            'price' => 'required',
            'cost_price' => 'required',
            'is_discount_available' => 'required',
            'discount_price' => 'required',
            'short_description' => 'required',
        ]);

        $product=Product::where("slug","=",$slug)->first();
        $product->name=$request->name;
        $product->slug=$request->name;
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
    function delete($id){
        $product=Product::where("id","=",$id)->first();
        $product->delete();
        return back();
    }
}
