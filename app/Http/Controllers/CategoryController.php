<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index() {

        $category = Category::orderBy('created_at','DESC')->get();

        return view('categories.index', compact('category'));
    }

    public function store(Request $req){
        $validated = $req->validate([
            'name' => 'required|string|unique:categories',
        ]);

        $category = Category::create([
            'name' => $req->name,
        ]);

        return back()->with('success','Data berhasil ditambah');
    }

    public function edit($id){
        $category = Category::find($id);

        return view('categories.edit',compact('category'));
    }

    public function update(Request $req, $id){
        $validated = $req->validate([
            'name' => 'required|unique:categories',
        ]);

        try {
            $category = Category::find($id);
            $category->update([
                'name' => $req->name,
            ]);
        } catch (\Throwable $th) {
            return back()->with('error',$th->getMessage());
        }

        return redirect('category')->with('success','Data berhasil diedit');
    }

    public function delete($id){
        $category = Category::find($id);
        $category->delete();

        return back()->with('success','Data berhasil dihapus');
    }
}
