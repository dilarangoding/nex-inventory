<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(){
        $product = Product::with(['category'])->orderBy('created_at','DESC')->get();

        return view('products.index',compact('product'));
    }

    public function create() {
        $category = Category::all();

        return view('products.create',compact('category'));
    }

    public function store(Request $req){
        $validated = $req->validate([
            'name'          => 'required|string|unique:products|max:255',
            'category_id'   => 'required',
            'price'         => 'required',
            'qty'           => 'required',
            'description'   => 'required|string',
        ]);

        try {
            $product = Product::create([
                'category_id'  => $req->category_id,
                'name'         => $req->name,
                'price'        => $req->price,
                'qty'          => $req->qty,
                'description'  => $req->description,
            ]);

            return redirect('product')->with('success','Data berhasil ditambahkan');
        } catch (\Throwable $th) {
            return back()->with('error',$th->getMessage());
        }
    }

    public function edit($id){
        $product = Product::find($id);
        $category = Category::all();

        return view('products.edit',compact('product','category'));
    }

    public function update(Request $req, $id){
        $validated = $req->validate([
            'name'          => 'required|string|max:255|unique:products,name,'.$id,
            'category_id'   => 'required',
            'price'         => 'required',
            'qty'           => 'required',
            'description'   => 'required|string',
        ]);

        try {
            $product = Product::find($id);
            $product->update([
                'category_id'  => $req->category_id,
                'name'         => $req->name,
                'price'        => $req->price,
                'qty'          => $req->qty,
                'description'  => $req->description,
            ]);

            return redirect('product')->with('success','Data berhasil diedit');
        } catch (\Throwable $th) {
            return back()->with('error',$th->getMessage());
        }
    }

    public function delete($id){
        $product = Product::find($id);
        $product->delete();

        return back()->with('success','Data berhasil dihapus');
    }


}
