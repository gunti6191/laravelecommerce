<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

class ProductsController extends Controller
{
   function index(){
    $product = User::get()->where('id', 1);
    dd($product[0]);
   }
}
