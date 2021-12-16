<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\products;
use App\Models\cart;
use Session;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Auth;
class frontendcontroller extends Controller
{
    //
    function index()
    {
        $products = products::all();
        $categories = category::all();

        //$userId=Session::get('user')['id'];
        //view::shera ($total=cart::where('user_id',$userId)->count());
        return view('frontendviews/index',['products'=>$products,'categories'=>$categories]);
    }
    function details($id)
    {
        $products = products::find($id);
        return view('frontendviews/details',['products'=>$products]);
    }
    function viewcategory($id)
    {
        if(category::where('id',$id)->exists())
       {
           $categories = category::where('id',$id)->first();
        $products = products::where('cart_id',$categories->id)->get();
        return view('frontendviews/viewcategory',['products'=>$products,'categories'=>$categories]);
       }else
       {
           return redirect('/');
       }
    }
    public function addprotocart(Request $req)
    {
        $cart = new cart;
      
        $prod_id =$req->input('prod_id');
         $user_id =$req->input('user_id');
         $prod_name =$req->input('prod_name');
         $prod_price =$req->input('prod_price');
      if(cart::where('prod_id',$prod_id)->where('user_id',$user_id)->exists())
       {
        return redirect('/')->with('status','product already added to cart.');
          
        }else{
            $cart = new cart;
            $cart->user_id=$req->session()->get('user')['id'];
            $cart->prod_id=$req->prod_id;
            $cart->prod_name=$req->prod_name;
            $cart->prod_price=$req->prod_price;
            $cart->prod_image=$req->prod_image;
            $cart->prod_qty=$req->prod_qty;
            $cart->save();
            return redirect('/')->with('status','product added to cart.');
        }
        //cart calculation
        
        }
        function cartItem()
        {
            $userId=Session::get('user')['id'];
          return cart::where('user_id',$userId)->count();
        }
        function cartpage()
        {
            $user_id= Session::get('user')['id'];
            $cart=DB::table('carts')
            ->where('carts.user_id',$user_id)
            ->get();
            
           return view('frontendviews/cartpage',['cart'=>$cart]);
        }

       
       public function removecart($id)
    {
        $user_id=Session::get('user')['id'];
            cart::destroy($id);
            return redirect('cartpage');
        }

        public function searchitem(Request $req){
            $search=products::
            where('name','like','%'.$req->input('query').'%')
            ->get();
            return view('frontendviews/searchitem',['products'=>$search]);
        }
       }
          
