<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoty;
use App\Models\Product;
use Config , Validator;

class CategoryController extends Controller
{
    var $rp = 3;
    public function index(){
        $categorys = Categoty::paginate($this->rp);
        return view('category/index',compact('categorys'));
    }
    public function search(Request $request){
        $query = $request->q;
        if($query){
            $categorys = Categoty::where('id','like','%'.$query.'%')->orWhere('name','like','%'.$query.'%')->paginate($this->rp);
        }else {
            $categorys = Categoty::paginate($this->rp);
        }
        return view('category/index', compact('categorys'));
    }
    public function edit($id = null){
        if($id){
            $category = Categoty::where('id',$id)->first(); return view('category/edit')->with('category',$category);
        } else {
            return view('category/add');
        }
    }
    public function insert(Request $request){
        $category = new Categoty();
        $category->name = $request->name;
        $category->id = $request->id;
        $category->save();

        return redirect('category')->with('ok',true)->with('msg','เพิ่มประเภทสินค้าเรียบร้อยแล้ว');
    }
    public function update(Request $request ){
        $rule = array(
            'name' => 'required',
        );
        $massages = array(
            'required' => 'กรุณากรอกข้อมูล :attribute ให้ครบถ้วน' , 'numeric' => 'กรุณากรอกข้อมูล :attribute ให้เป็นตัวเลข',

        );
        $id = $request->id;
        $temp = array(
            'name' => $request->name,
        );
        $validator = Validator::make($temp, $rule,$massages);
        if ($validator->fails()) {
            return redirect('category/edit/'.$id)->withErrors($validator)->withInput();
    }
    $category = Categoty::find($id);
    $category->name = $request->name;
    $category->save();
    return redirect('category')->with('ok',true)->with('msg','บันทึกข้อมูลเรียบร้อยแล้ว');
    }
    public function remove($id){
        Categoty::find($id)->delete();
        return redirect('category')->with('ok',true)->with('msg','ลบประเภทสินค้าสำเร็จ');
    }

}