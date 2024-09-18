<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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

        // dd($_POST);


        $validatedData = $request->validate([
            'product_title' => 'required|string|max:255',
            'short_description' => 'required|string|max:255',
            'long_description' => 'required',
            'product_type' => 'required|string|max:255',
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

        ]);

        $currentDate = Carbon::now()->format('Y-m-d');

        $productId = DB::table('product')->insertGetId([
            'product_title' => $validatedData['product_title'],
            'short_description' => $validatedData['short_description'],
            'long_description' => $validatedData['long_description'],
            'product_type' => $validatedData['product_type'],
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
            'created_at' => $currentDate
        ]);


        $request->validate([
            'attributes.*.label' => 'required|string|max:255',
            'attributes.*.mrp' => 'nullable|numeric|min:1|max:1000000000.00',
            'attributes.*.price' => 'nullable|numeric|min:1|max:1000000000.00',
            'attributes.*.quantity' => 'nullable|numeric',
            'single_product_images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $singleProductImages = [];


        if ($request->hasFile('single_product_images')) {
            foreach ($request->file('single_product_images') as $image) {
                $imageName = 'singleProductImage'.time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('admin_assets/productimg'), $imageName);
                $singleProductImages[] = $imageName;
            }
        }

        $attributes = $request->input('attributes') ?? [];
        $insertedAttributeIds = [];

        foreach ($attributes as $index => $attribute) {
            $attributeId = DB::table('product_attribute')->insertGetId([
                'productid' => $productId,
                'label' => $attribute['label'],
                'mrp' => $attribute['mrp'],
                'price' => $attribute['price'],
                'quantity' => $attribute['quantity'],
                'images' => json_encode($singleProductImages)
            ]);

            // dd("hello");

<<<<<<< HEAD
            $request->validate([
                'colorattributes.*.label' => 'nullable|string|max:255',
                'colorattributes.*.mrp' => 'nullable|numeric|min:1|max:1000000000.00',
                'colorattributes.*.price' => 'nullable|numeric|min:1|max:1000000000.00',
                'colorattributes.*.quantity' => 'nullable|numeric',
                'colorattributes.*.color' => 'nullable|string|max:255',
                'colorattributes.*.image1' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'colorattributes.*.image2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'colorattributes.*.image3' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'colorattributes.*.image4' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'colorattributes.*.image5' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'colorattributes.*.image6' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'colorattributes.*.image7' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]);
            
            $colorAttributes = $request->input('colorattributes') ?? [];
            
            foreach ($colorAttributes as $colorIndex => $colorattribute) {
                $images = [];
            
                // Loop through image fields
                for ($i = 1; $i <= 7; $i++) {
                    $imageField = 'image' . $i;
            
                    if ($request->hasFile("colorattributes.$colorIndex.$imageField")) {
                        $imageFile = $request->file("colorattributes.$colorIndex.$imageField");
                        $imageName = $imageField . $colorIndex . time() . '.' . $imageFile->getClientOriginalExtension();
                        $imageFile->move(public_path('admin_assets/productimg'), $imageName);
                        $images[$imageField] = $imageName;
                    } else {
                        $images[$imageField] = null;
                    }
                }
            
                // Insert into database
                DB::table('product_color_attribute')->insert([
                    'attributeid' => $attributeId,
                    'label' => $colorattribute['label'] ?? null,
                    'mrp' => $colorattribute['mrp'] ?? null,
                    'price' => $colorattribute['price'] ?? null,
                    'quantity' => $colorattribute['quantity'] ?? null,
                    'color' => $colorattribute['color'] ?? null,
                    'image1' => $images['image1'] ?? null,
                    'image2' => $images['image2'] ?? null,
                    'image3' => $images['image3'] ?? null,
                    'image4' => $images['image4'] ?? null,
                    'image5' => $images['image5'] ?? null,
                    'image6' => $images['image6'] ?? null,
                    'image7' => $images['image7'] ?? null,
                ]);
            }
            
=======
            $insertedAttributeIds[] = [
                'id' => $attributeId,
                'label' => $attribute['label']
            ];
        }


        $request->validate([

            'colorattributes.*.label' => 'nullable|string|max:255',
            'colorattributes.*.mrp' => 'nullable|numeric|min:1|max:1000000000.00',
            'colorattributes.*.price' => 'nullable|numeric|min:1|max:1000000000.00',
            'colorattributes.*.quantity' => 'nullable|numeric',
            'colorattributes.*.color' => 'nullable|string|max:255',
            'colorattributes.*.image1' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'colorattributes.*.image2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'colorattributes.*.image3' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'colorattributes.*.image4' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'colorattributes.*.image5' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'colorattributes.*.image6' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'colorattributes.*.image7' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $colorAttributes = $request->input('colorattributes') ?? [];

        foreach ($colorAttributes as $colorIndex => $colorattribute) {
            $images = [];

            for ($i = 1; $i <= 7; $i++) {
                $imageField = 'image' . $i;

                if ($request->hasFile("colorattributes.$colorIndex.$imageField")) {
                    $imageFile = $request->file("colorattributes.$colorIndex.$imageField");
                    $imageName = $imageField . $colorIndex . time() . '.' . $imageFile->getClientOriginalExtension();
                    $imageFile->move(public_path('admin_assets/productimg'), $imageName);
                    $images[$imageField] = $imageName;
                } else {
                    $images[$imageField] = null;
                }
            }

            $attributeIdForColor = null;
            foreach ($insertedAttributeIds as $insertedAttribute) {
                if ($insertedAttribute['label'] == $colorattribute['label']) {
                    $attributeIdForColor = $insertedAttribute['id'];
                    break;
                }
            }

            DB::table('product_color_attribute')->insert([
                'attributeid' => $attributeIdForColor,
                'label' => $colorattribute['label'],
                'mrp' => $colorattribute['mrp'] ?? null,
                'price' => $colorattribute['price'] ?? null,
                'quantity' => $colorattribute['quantity'] ?? null,
                'color' => $colorattribute['color'] ?? null,
                'image1' => $images['image1'] ?? null,
                'image2' => $images['image2'] ?? null,
                'image3' => $images['image3'] ?? null,
                'image4' => $images['image4'] ?? null,
                'image5' => $images['image5'] ?? null,
                'image6' => $images['image6'] ?? null,
                'image7' => $images['image7'] ?? null,
            ]);
>>>>>>> 02bfcaa196d457cefa0fd20b0badaf0b62f3e9a3
        }

        return redirect()->back()->with('success', 'Product added successfully!');

}

}
