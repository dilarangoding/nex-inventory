@extends('layouts.master')
@section('title','Tambah Barang Masuk')

@section('content')
<div class="page-heading">
    <h3>Tambah Barang Masuk</h3>
</div>

<div class="page-content">
    <section class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Barang Masuk</h4>
                </div>
                <div class="card-body">
                    <form  method="POST" action="{{route('inventory.store')}}">
                        @csrf
                        @method('POST')

                        <div class="form-group">
                            <label for="product_id">Produk</label>
                            <select name="product_id" id="product_id" class="form-control">
                               <option selected disabled>-- Pilih Produk --</option>
                               @foreach ($product as $item)
                               <option value="{{$item->id}}" {{ $item->id == old('product_id') ? 'selected' : '' }}>{{$item->name}} </option>
                               @endforeach
                            </select>
                            <p class="text-danger">{{$errors->first('product_id')}}</p>
                        </div>

                        <div class="form-group">
                            <label for="purchase_date">Tanggal Masuk</label>
                            <input type="date" class="form-control" id="purchase_date" name="purchase_date" value="{{old('purchase_date')}}" placeholder="Masukan Harga Produk">
                            <p class="text-danger">{{$errors->first('purchase_date')}}</p>
                        </div>

                        <div class="form-group">
                            <label for="purchase_price">Harga Masuk</label>
                            <input type="number" class="form-control" id="purchase_price" name="purchase_price" value="{{old('purchase_price')}}" placeholder="Masukan Harga Masuk">
                            <p class="text-danger">{{$errors->first('purchase_price')}}</p>
                        </div>

                        <div class="form-group">
                            <label for="qty">Quantity</label>
                            <input type="number" class="form-control" id="qty" name="qty" value="{{old('qty')}}" placeholder="Masukan Quantity">
                            <p class="text-danger">{{$errors->first('qty')}}</p>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary btn-block">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
</div>

@endsection
