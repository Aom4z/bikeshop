<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoty;

class CategoryController extends Controller
{
    public function index(){
        $category = Categoty::all();
        return view('category/index',compact('category'));
    }
}
