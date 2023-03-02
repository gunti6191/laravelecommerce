<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use DataTables;

class BrandController extends Controller
{
    function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Brand::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="'.route("brands.edit", $row->slug ).'" class="edit btn btn-success btn-sm mx-3">Edit</a>
                                <a href="javascript:void(0)" onclick="deleteBtn('.$row->id.');" class="delete btn btn-danger btn-sm">Delete</a>';

                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('ecomProject.brands.listBrand');
    }
    function create(){
        return view("ecomProject.brands.addBrand");
    }
    function store(Request $request){

        request()->validate([
            'name' => 'required|unique:brands',
            'status' => 'required',
        ]);

        $brand = new Brand;
        $brand->name=$request->name;
        $brand->slug=$request->name;
        $brand->status=$request->status;
        $brand->save(); // Row updated in Database table
        return redirect()->route('brands.index');
    }
    function edit($id){
        $brand = Brand::where('slug', $id)->first();
        $data['brand'] = $brand;
        return view('ecomProject.brands.editBrand', $data);
    }
    function update(Request $request, $id){

        request()->validate([
            'name' => 'required',
            'status' => 'required',
        ]);

        $brand=Brand::where("id","=",$id)->first();
        $brand->name=$request->name;
        $brand->slug=$request->name;
        $brand->status=$request->status;
        $brand->save(); // Row updated in Database table
        return redirect()->route('brands.index');
    }
    function delete($id){
        $brand=Brand::where("id","=",$id)->first();
        $brand->delete();
        return back();
    }
}
