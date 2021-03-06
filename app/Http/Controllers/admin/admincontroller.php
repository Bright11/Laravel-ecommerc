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
       $c = new category();
       $c->name=$req->name;
       if($req->hasfile('image'))
       {
            $file = $req->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('catigory/',$filename);
            $c->image = $filename;
            $c->save();
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
        $p= new products;
            $p->name=$req->name;
            $p->cart_id=$req->cart_id;
            $p->price=$req->price;
            $p->discount=$req->discount;
            $p->discription=$req->discription;
            $p->keywords=$req->keywords;
          //  'image'=>$path,
                $file = $req->file('image');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time().'.'.$extenstion;
                $file->move('product/',$filename);
                $p->image = $filename;
                $p->save();
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
