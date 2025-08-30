<?php

namespace App\Http\Controllers;
use App\Models\product;
use App\Models\banner;
use App\Models\category;
use App\Models\CART;
use App\Models\order;
use App\Models\itemorder;
use App\Models\websiteUser;
use Illuminate\Http\Request;

use DB;


class WebsiteController extends Controller
{
    function index()  {

        $products = Product::where('featured', 1)->where('status', 1)->get();
        $banners = banner::where('status', 1)->get();
        $categories = category::where('status', 1)->get();
        return view('index', compact('products','banners','categories'));
    }
    function  shop()  {

        $categories = category::where('status', 1)->get();
        $products = product::all();
        return view('shop', compact('categories','products'));
    }
    function  shopcategory($id)  {
        $products = product::where('category_id', $id)->get();
        $categories = category::where('status', 1)->get();
        return view('shop', compact('products','categories'));
    }
    function cart() {
        $cartproduct = DB::table('products')
            ->join('c_a_r_t_s', 'c_a_r_t_s.productId', '=', 'products.id')
            ->select('products.name', 'products.price', 'products.quantity as pQuantity', 'products.image', 'c_a_r_t_s.*')
            ->where('c_a_r_t_s.customerId', session()->get('id'))   
            ->get();
        
        return view('cart', compact('cartproduct'));
    }
    

    function checkout(Request $data) {
       if (session()->get('id')) {
        $order = new Order();
        $order->status = "pending";
        $order->customerId=session()->get('id');
        $order->bill = $data->input('bill');
        $order->fullname = $data->input('fullname');
        $order->email = $data->input('email');
        $order->phone = $data->input('phone');
        $order->address = $data->input('address');

        if ($order->save()) {
            $carts =Cart::where('customerid', session()->get('id'))->get();

            foreach ($carts as $item) {

                $product = Product::find($item->productId);
                    $orderItem = new ItemOrder();
                    $orderItem->productId = $item->productId;
                    $orderItem->quantity = $item->quantity;
                    $orderItem->price = $product->price;
                    $orderItem->orderId = $order->id;
                    $orderItem->save();
                    $item->delete();

            }
       }
           return redirect()->back()->with('success','Success! your order has been placed successfully');

       }else{

        return redirect('website.login')->with('error','Info! Please login to system');
           
        }
 
    }
    function Login()  {
        return view('Login');
    }
    function loginUser(Request $data)  {
      $user = websiteUser::where('email',$data->input('email'))->where('password',$data->input('password'))->first();

      if($user) {

        session()->put('id',$user->id);
        session()->put('type',$user->type);

      if ($user->type=='Customer') {

           return redirect()->route('website.index');
      }

      }else {
           return back()->with(['error' => "Invalid Credentials!!"])->onlyInput('email');
      }

     }



    function register()  {
        return view('register');
    }
    function registerUser(Request $data)  {
        $newUser = new websiteUser();
        $newUser->fullname=$data->input('fullname');
        $newUser->email=$data->input('email');
        $newUser->password=$data->input('password');
        $newUser->type="Customer";
        if ($newUser->save()) {
            return redirect()->route('website.login')->with('success','Congratulation! your account is create');
        }
    }
    function logout() {
        session()->forget('id');
        session()->forget('type');
        return redirect()->route('website.login');
    }
    
    function shop_detail($id = null)  {
        $products = product::find($id);
        return view('shop_detail', compact('products'));
    }

    function addToCart(Request $data)  {
        if (session()->has('id')) {
            $product =new CART();
            $product->productId=$data->input('id');
            $product->quantity=$data->input('quantity');
            $product->customerId=session()->get('id');
            $product->save();
            return redirect()->route('website.index')->with('success','Congratulations! Product Added Into Cart');
        }else {
            return redirect()->route('website.login')->with('error','Info! Please Login to System');
        }
        
    }
    function deletecartproduct($id)  {
        $product=CART::find($id);
        $product->delete();
        return redirect()->back()->with('success','1 Item has been deleted from cart');
    }
}


