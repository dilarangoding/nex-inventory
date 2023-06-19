@extends('layouts.master')
@section('title','Edit Produk')

@section('content')
<div class="page-heading">
    <h3>Edit Produk</h3>
</div>

<div class="page-content">
    <section class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Produk</h4>
                </div>
                <div class="card-body">
                    <form  method="POST" action="{{route('product.update',$product->id)}}">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="name">Nama </label>
                            <input type="text" class="form-control" id="name" name="name"  placeholder="Masukan Nama Produk" value="{{$product->name}}">
                            <p class="text-danger">{{$errors->first('name')}}</p>
                        </div>

                        <div class="form-group">
                            <label for="category_id">Kategori</label>
                            <select name="category_id" id="category_id" class="form-control">
                               <option selected disabled>-- Pilih Kategori --</option>
                               @foreach ($category as $item)
                               <option value="{{$item->id}}" {{ $item->id == $product->category_id ? 'selected' : '' }}>{{$item->name}}</option>
                               @endforeach
                            </select>
                            <p class="text-danger">{{$errors->first('category')}}</p>
                        </div>

                        <div class="form-group">
                            <label for="price">Harga</label>
                            <input type="number" class="form-control" id="price" name="price" value="{{$product->price}}" placeholder="Masukan Harga Produk">
                            <p class="text-danger">{{$errors->first('price')}}</p>
                        </div>

                        <div class="form-group">
                            <label for="qty">Quantity</label>
                            <input type="number" class="form-control" id="qty" name="qty" value="{{$product->qty}}" placeholder="Masukan Quantity">
                            <p class="text-danger">{{$errors->first('qty')}}</p>
                        </div>

                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <textarea name="description" id="description" cols="3" rows="3" placeholder="Masukan Deskripsi" class="form-control">{{$product->description}}</textarea>
                            <p class="text-danger">{{$errors->first('description')}}</p>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary btn-block">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
</div>

@endsection
