<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Product;
use Session;

class ProductController extends Controller
{
    public function add(){
        $r=request();//get data from html input
        if($r->file('productImage')!=''){
            $image=$r->file('productImage');        
            $image->move('images',$image->getClientOriginalName());                   
            $imageName=$image->getClientOriginalName(); 
            
        }else{
            $imageName="empty.jpg";
        }
        $add=Product::create([
            'name'=>$r->productName,
            'quantity'=>$r->productQuantity,
            'price'=>$r->productPrice,
            'categoryID'=>$r->productCategoryID,
            'image'=>'' . $imageName,             //$r->productImage,
        ]);
        Session::flash('success',"New Product added");
        return redirect()->route('showProduct');
    }

    public function view(){
        $viewProduct=Product::all();//SQL "select * from product"
        return view('showProduct')->with('products',$viewProduct);
    }

    public function delete($id){
        $product=Product::find($id);
        $product->delete();//SQL "delete from product where id='$id'
        return redirect()->route('showProduct');
    }

    public function edit($id){
        $viewProduct=Product::all()->where('id',$id); //SQL "select * from product while id='$id'
        
        return view('editProduct')->with('products',$viewProduct);
    }


    public function update(){
        $r=request();
        $product=Product::find($r->id);
        if($r->file('productImage')!=''){
            $image=$r->file('productImage');        
            $image->move('images',$image->getClientOriginalName());                   
            $imageName=$image->getClientOriginalName(); 
            $product->image=$imageName;
        }    
        $product->name=$r->productName;
        $product->quantity=$r->productQuantity;
        $product->price=$r->productPrice;
        $product->categoryID=$r->CategoryID;
        $product->save();
        return redirect()->route('showProduct');
    }


    public function notebooks()
    {
        $notebooks = Product::where('categoryID', 1)->get(); //  1 is the ID for notebooks category

        return view('notebooks', ['notebooks' => $notebooks]);
    }

    public function pens()
    {
        $pens = Product::where('categoryID', 2)->get(); //  2 is the ID for pens category

        return view('pen', ['pens' => $pens]);
    }

    public function deskAccessories()
    {
        $deskAccessories = Product::where('categoryID', 3)->get(); //  3 is the ID for desk accessories category

        return view('desk', ['deskAccessories' => $deskAccessories]);
    }
}
