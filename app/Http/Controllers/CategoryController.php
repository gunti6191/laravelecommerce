<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use DataTables;

class CategoryController extends Controller
{
    function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Category::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="javascript:void(0)" onclick="editBtn('.$row->id.');" class="edit btn btn-success btn-sm mx-3">Edit</a>
                                <a href="javascript:void(0)" onclick="deleteBtn('.$row->id.');" class="delete btn btn-danger btn-sm">Delete</a>';

                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('ecomProject.categories.listCategory');
    }
    function create(){
        return view("ecomProject.categories.addCategory");
    }
    function store(Request $request){

        request()->validate([
            'name' => 'required|unique:categories',
            'status' => 'required',
        ]);

        $category = new Category;
        $category->name=$request->name;
        $category->slug=$request->slug;
        $category->status=$request->status;
        $category->save(); // Row updated in Database table
        return redirect()->route('categories.index');
    }
    function edit($id){
        $category = Category::where('id', $id)->first();
        $data['category'] = $category;
        return view('ecomProject.categories.editCategory', $data);
    }
    function update(Request $request, $id){

        request()->validate([
            'name' => 'required',
            'status' => 'required',
        ]);

        $category=Category::where("id","=",$id)->first();
        $category->name=$request->name;
        $category->slug=$request->slug;
        $category->status=$request->status;
        $category->save(); // Row updated in Database table
        return redirect()->route('categories.index');
    }
    function delete($id){
        $category=Category::where("id","=",$id)->first();
        $category->delete();
        return back();
    }
}
