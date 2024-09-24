<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function manageProduct(){


        // $productId = 4;


        // $product = DB::table('product')
        //     ->where('id', $productId)
        //     ->first();

        // $attributeIds = json_decode($product->attributeId, true);

        // $sizes = DB::table('product_attribute')
        //     ->whereIn('id', $attributeIds)
        //     ->get();

        // dd([
        //     'product' => $product,
        //     'sizes' => $sizes
        // ]);


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

        return $html;

    }

    public function getSubSubCategory(Request $request){
        $subCategoryId = $request->subCategoryId;

        $subSubCategory = DB::table('sscategories')->where('scategory_id',$subCategoryId)->orderBy('ss_name','asc')->get();

        $html = '<option selected disabled>Choose</option>';

        foreach($subSubCategory as $item){
            $html.='<option value="'.$item->id.'">'.$item->ss_name.'</option>';
        }

        return $html;
    }


    public function productStore(Request $request){

        // dd($request->all());

        $validatedData = $request->validate([
            // 'attributeId' =>'required',
            'product_title' => 'required|string|max:255',
            'short_description' => 'required|string|max:255',
            'long_description' => 'required',
            'product_type' => 'required|string|max:255',
            'single_product_images' => 'required',
            'meta_title' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'category' => 'required',
            'sub_category' => 'required',
            'sub_sub_category' => 'required',
            'manufacturer' => 'required',
            'model' => 'required|string|max:255',
            'sku' => 'required|string|max:255',
            'tax_class' => 'required',
            'gst' => 'required|numeric|min:0|max:100',
            'hsn_code' => 'nullable|string|max:255',
            'length' => 'nullable|string|max:255',
            'width' => 'nullable|string|max:255',
            'height' => 'nullable|string|max:255',
            'available_date' => 'required|date',
            'weight_class' => 'nullable|string|max:255',
            'weight' => 'nullable|string|max:255',
            'product_status' => 'required|string|max:255',
            'sort_product' => 'nullable|integer',
            'maximum_order' => 'required|integer',
            'payment_type' => 'required|string|max:255',
            'product_return' => 'required|string|max:255',
            'product_warrenty' => 'nullable|string|max:255',
            'tax' => 'required|string|max:255',
            'product_mrp' => 'required|numeric|min:1|max:1000000000.00',
            'product_price' => 'required|numeric|min:1|max:1000000000.00',


        ]);

        $featured_product = $request->has('featured_product') ? 1 : 0;
        $popular_product = $request->has('popular_product') ? 1 : 0;

        $currentDate = Carbon::now()->format('Y-m-d');



        $singleProductImages = [];

            if ($request->hasFile('single_product_images')) {
                foreach ($request->file('single_product_images') as $image) {

                    $imageName = 'singleProductImage_' . microtime(true) . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

                    $image->move(public_path('admin_assets/productimg'), $imageName);

                    $singleProductImages[] = $imageName;
                }
}

        $productId = DB::table('product')->insertGetId([

            'product_title' => $validatedData['product_title'],
            'short_description' => $validatedData['short_description'],
            'long_description' => $validatedData['long_description'],
            'product_type' => $validatedData['product_type'],
            'single_product_images' => json_encode($singleProductImages),
            'meta_title' => $validatedData['meta_title'],
            'meta_keywords' => $validatedData['meta_keywords'],
            'meta_description' => $validatedData['meta_description'],
            'category' => $validatedData['category'],
            'sub_category' => $validatedData['sub_category'],
            'sub_sub_category' => $validatedData['sub_sub_category'],
            'manufacturer' => $validatedData['manufacturer'],
            'model' => $validatedData['model'],
            'sku' => $validatedData['sku'],
            'tax_class' => $validatedData['tax_class'],
            'gst' => $validatedData['gst'],
            'hsn_code' => $validatedData['hsn_code'],
            'length' => $validatedData['length'],
            'width' => $validatedData['width'],
            'height' => $validatedData['height'],
            'available_date' => $validatedData['available_date'],
            'weight_class' => $validatedData['weight_class'],
            'weight' => $validatedData['weight'],
            'product_status' => $validatedData['product_status'],
            'sort_product' => $validatedData['sort_product'],
            'maximum_order' => $validatedData['maximum_order'],
            'payment_type' => $validatedData['payment_type'],
            'product_return' => $validatedData['product_return'],
            'product_warrenty' => $validatedData['product_warrenty'],
            'tax' => $validatedData['tax'],
            'product_mrp' => $validatedData['product_mrp'],
            'product_price' => $validatedData['product_price'],
            'featured_product' => $featured_product,
            'popular_product' => $popular_product,
            'created_at' => $currentDate
        ]);


        $request->validate([
            'attributes.*.label' => 'nullable|string|max:255',
            'attributes.*.color' => 'nullable|string|max:255',
            'attributes.*.mrp' => 'required|numeric|min:0|max:1000000000.00',
            'attributes.*.price' => 'required|numeric|min:0|max:1000000000.00',
            'attributes.*.quantity' => 'required|numeric',
            'attributes.*.images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $attributes = $request->input('attributes');


        foreach ($attributes as $index => $attribute) {

            $attributeId = DB::table('product_attribute')->insertGetId([
                'productid' => $productId,
                'label' => $attribute['label'],
                'color' => $attribute['color'],
                'mrp' => $attribute['mrp'],
                'price' => $attribute['price'],
                'quantity' => $attribute['quantity'],
            ]);


            if ($request->hasFile("attributes.{$index}.images")) {
                $images = [];
                foreach ($request->file("attributes.{$index}.images") as $image) {
                    $imageName = 'attributeImage_' . time() . '_' . $image->getClientOriginalName();
                    $image->move(public_path('admin_assets/productimg'), $imageName);
                    $images[] = $imageName;
                }


                DB::table('product_attribute')->where('id', $attributeId)->update([
                    'images' => json_encode($images)
                ]);
            }
        }




        return redirect()->back()->with('success', 'Product added successfully!');

}

}
