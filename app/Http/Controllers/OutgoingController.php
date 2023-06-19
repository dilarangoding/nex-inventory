<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outgoing;
use App\Models\Product;

class OutgoingController extends Controller
{
    public function index(){
        $outgoing = Outgoing::with('product')->orderBy('created_at','DESC')->get();
        return view('outgoings.index',compact('outgoing'));
    }

    public function create(){
        $product = Product::all();

        return view('outgoings.create',compact('product'));
    }

    public function store(Request $req){
        $validated = $req->validate([
            'product_id'     => 'required',
            'customer_name'  => 'required',
            'outgoing_date'  => 'required',
            'qty'            => 'required',
        ]);

        try {
            $outgoing = Outgoing::create([
                'product_id'     => $req->product_id,
                'customer_name'  => $req->customer_name,
                'outgoing_date'  => $req->outgoing_date,
                'qty'            => $req->qty,
            ]);

            $product = Product::findOrFail($req->product_id);
            $product->qty -= $req->qty;
            $product->update();


            return redirect('outgoing')->with('success','Data berhasil ditambahkan');
        } catch (\Throwable $th) {
            return back()->with('error',$th->getMessage());
        }
    }

    public function edit($id){
        $outgoing = Outgoing::find($id);
        $product   = Product::all();

        return view('outgoings.edit',compact('outgoing','product'));
    }

    public function update(Request $req, $id){
        $validated = $req->validate([
            'product_id'     => 'required',
            'customer_name'  => 'required',
            'outgoing_date'  => 'required',
            'qty'            => 'required',
        ]);

        try {
            $outgoing= Outgoing::find($id);

            $product = Product::findOrFail($req->product_id);
            $product->qty += $outgoing->qty;
            $product->qty -= $req->qty;
            $product->update();

            $outgoing->update([
                'product_id'     => $req->product_id,
                'customer_name'  => $req->customer_name,
                'outgoing_date'  => $req->outgoing_date,
                'qty'            => $req->qty,
            ]);

            return redirect('outgoing')->with('success','Data berhasil diubah');
        } catch (\Throwable $th) {
            return back()->with('error',$th->getMessage());
        }
    }

    public function delete($id){
        $outgoing = Outgoing::find($id);
        $outgoing->delete();

        return back()->with('success','Data berhasil dihapus');
    }
}
