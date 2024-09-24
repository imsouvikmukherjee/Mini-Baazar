<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class FrontController extends Controller
{
    public function index(Request $request): View
    {
        $result['categories'] = DB::table('mcategories')
            ->where(['status' => 1])
            ->orderBy('id','asc')
            ->get();

            $result['manufacturer'] = DB::table('manufacturers')
            ->where(['status' => 1])
            ->orderBy('id','asc')
            ->get();
    
        $result['subcategories'] = DB::table('scategories')
            ->where(['status' => 1])
            ->get();
    
        $result['user'] = $request->user();

        $result['featured_product'] = DB::table('product')
        ->where(['product_status' => 1])
        ->where(['featured_product' => 1])
        ->get(); 

        $result['popular_product'] = DB::table('product')
        ->where(['product_status' => 1])
        ->where(['popular_product' => 1])
        ->get(); 

        $result['new_product'] = DB::table('product')
        ->where(['product_status' => 1])
        ->get(); 

        // dd($result['featured_product']);
        
        return view('user.index', $result);
    }

    public function about_us(){

        return view('user.about_us');
    }
    public function delivery_information(){

        return view('user.delivery_information');
    }
    public function privacy_policy(){

        return view('user.privacy_policy');
    }
    public function terms_conditions(){

        return view('user.terms_conditions');
    }
    
    public function contact_us(){

        return view('user.contact_us');
        
    }
    public function cart(){

        return view('user.cart');
        
    }
    public function product_details($id){
        $decryptedId = Crypt::decrypt($id);

        $result['product_details'] = DB::table('product')
        -> leftJoin('manufacturers','product.manufacturer','=','manufacturers.id')
        ->select('product.*','manufacturers.brand')
        ->where(['product.id' => $decryptedId])
        ->get(); 

$result['product_attributes_size'] = DB::table('product_attribute')
    ->where('productid', $decryptedId)
    ->select('id', 'label')
    ->get(); 

$result['product_attributes_color'] = DB::table('product_attribute')
    ->where('productid', $decryptedId)
    ->select('id', 'color')
    ->get(); // Similarly, call get() here as well


        // dd( $result['product_details'] );
        // dd( $result['product_attributes_size'] );
        return view('user.product-details', $result);
        
    }
    public function color_by_image(Request $request){

    
    $result['attributes_color_images'] = DB::table('product_attribute')
    ->where('id', $request->id)
    ->get();
    $jsonString=$result['attributes_color_images'][0]->images;
    $imageArray = json_decode($jsonString);
// pre($imageArray);
    
    $images = [];
    foreach ($imageArray as $image) {
        $images[] = asset('admin_assets/productimg/' . $image);
    }

   
    $data = [
        'images' => $images,
      
    ];

   
    return response()->json($data);
    }
    public function checkout(){

        return view('user.checkout');
        
    }
    
}
