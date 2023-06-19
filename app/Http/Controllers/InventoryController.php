<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Product;

class InventoryController extends Controller
{
    public function index(){
        $inventory = Inventory::with(['product'])->orderBy('created_at','DESC')->get();

        return view('inventory.index',compact('inventory'));
    }

    public function create(){
        $product = Product::all();

        return view('inventory.create',compact('product'));
    }

    public function store(Request $req){
        $validated = $req->validate([
            'product_id'     => 'required',
            'purchase_date'  => 'required',
            'purchase_price' => 'required',
            'qty'            => 'required',
        ]);

        try {
            $inventory = Inventory::create([
                'product_id'     => $req->product_id,
                'purchase_date'  => $req->purchase_date,
                'purchase_price' => $req->purchase_price,
                'qty'            => $req->qty,
            ]);

            $product = Product::findOrFail($req->product_id);
            $product->qty += $req->qty;
            $product->update();


            return redirect('inventory')->with('success','Data berhasil ditambahkan');
        } catch (\Throwable $th) {
            return back()->with('error',$th->getMessage());
        }
    }

    public function edit($id){
        $inventory = Inventory::find($id);
        $product   = Product::all();

        return view('inventory.edit',compact('inventory','product'));
    }

    public function update(Request $req, $id){
        $validated = $req->validate([
            'product_id'     => 'required',
            'purchase_date'  => 'required',
            'purchase_price' => 'required',
            'qty'            => 'required',
        ]);

        try {
            $inventory= Inventory::find($id);

            $product = Product::findOrFail($req->product_id);
            $product->qty -= $inventory->qty;
            $product->qty += $req->qty;
            $product->update();

            $inventory->update([
                'product_id'     => $req->product_id,
                'purchase_date'  => $req->purchase_date,
                'purchase_price' => $req->purchase_price,
                'qty'            => $req->qty,
            ]);

            return redirect('inventory')->with('success','Data berhasil diubah');
        } catch (\Throwable $th) {
            return back()->with('error',$th->getMessage());
        }
    }

    public function delete($id){
        $inventory = Inventory::find($id);
        $inventory->delete();

        return back()->with('success','Data berhasil dihapus');
    }
}
