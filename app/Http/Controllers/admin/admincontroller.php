<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\products;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use illuminates\Support\Facades\DB;

class admincontroller extends Controller
{
    //
    function index()
    {
        return view('admins/index');
    }
    function addcategory()
    {
        return view('admins/addcategory');
    }
    function addcartodb(Request $req)
    {
       $categories = new category();
       $path = $req->image->store('public/cartegoryimg');
       if($file=$req->file('image'))
       {
           category::create([
            'name'=>$req->name,
            'image'=>$path,
           ]);
           return redirect('admins/viewcart')->with('status','Category added successfully');
       }
    }
    function addproduct()
    {
        $categories = category::all();
        return view('admins/addproduct',['categories'=>$categories]);
    }
    function addprotodb(Request $req)
    {
                //the image will be on storage folder
        //storage/app/public
        // to see the image,
        //php artisan storage:link
        $path = $req->image->store('public/productimg');
        //return $path;
        products::create([
            'name'=>$req->name,
            'cart_id'=>$req->cart_id,
            'price'=>$req->price,
            'discount'=>$req->discount,
            'discription'=>$req->discription,
            'keywords'=>$req->keywords,
            'image'=>$path,
        ]);
        return redirect('admins/viewpro')->with('status','Product added successfully');
    }
    function viewcart()
    {
        $categories = category::all();
        return view('admins/viewcart',['categories'=>$categories]);
    }
    function updatecartpage($id)
    {
        $categories = category::find($id);
        return view('admins/updatecartpage',['categories'=>$categories]);
    }
    function editcartodb(Request $req, $id)
    {
        $categories = category::find($id);
        if($req->hasFile('image'))
        {
            $path = $categories->image=$req->image->store('public/cartegoryimg');
            $categories->name = $req->name;
            $categories->image=$path;
            $categories->update();
            return redirect('admins/viewcart')->with('status','category updated successfully');
           }else
           {
            $path = $categories->image;
            $categories->name = $req->name;
               $categories->image=$path;
               $categories->update();
               return redirect('admins/viewcart')->with('status','category updated successfully');
           }
    }
    function viewpro()
    {
        
        $products = products::all();
        return view('admins/viewpro',['products'=>$products]);
    }
    function updatepropage($id)
    {
        $products = products::find($id);
        return view('admins/updatepropage',['products'=>$products]);
    }
    function updateprotodb(Request $req, $id)
    {
        $products = products::find($id);
        if($req->hasFile('image'))
        {
            $path = $products->image=$req->image->store('public/productimg');
            $products->name = $req->name;
            $products->price = $req->price;
            $products->discount = $req->discount;
            $products->discription = $req->discription;
            $products->keywords = $req->keywords;
            $products->image=$path;
            $products->update();
            return redirect('admins/viewcart')->with('status','category updated successfully');
           }else
           {
            $path = $products->image;
            $products->name = $req->name;
            $products->price = $req->price;
            $products->discount = $req->discount;
            $products->discription = $req->discription;
            $products->keywords = $req->keywords;
            $products->image=$path;
               $products->update();
               return redirect('admins/viewpro')->with('status','Product updated successfully');
           }

    }
}
