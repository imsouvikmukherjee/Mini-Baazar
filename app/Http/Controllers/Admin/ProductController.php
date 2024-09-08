<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function manageProduct(){

        return view('admin.products.manage_product');
    }


    public function addProduct(){

        $mcatogories = DB::table('mcategories')->where('status',1)->orderBy('name','asc')->get();
        $manufacturers = DB::table('manufacturers')->where('status',1)->orderBy('id','desc')->get();

        return view('admin.products.add_product', ['manufacturers' => $manufacturers, 'mcatogories' => $mcatogories]);
    }


    public function getsubCategory(Request $request){
        $categoryId = $request->categoryId;

        $subCategory = DB::table('scategories')->where('mcategory_id',$categoryId)->orderBy('s_name','asc')->get();

        $html = '<option selected disabled>Choose</option>';

        foreach($subCategory as $item){
            $html.='<option value="'.$item->id.'">'.$item->s_name.'</option>';
        }

        echo $html;

    }


    public function getSubSubCategory(Request $request){
        $subCategoryId = $request->subCategoryId;

        $subSubCategory = DB::table('sscategories')->where('scategory_id',$subCategoryId)->orderBy('ss_name','asc')->get();

        $html = '<option selected disabled>Choose</option>';

        foreach($subSubCategory as $item){
            $html.='<option value="'.$item->id.'">'.$item->ss_name.'</option>';
        }

        echo $html;
    }



}
