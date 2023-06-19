@extends('layouts.master')
@section('title','Edit Barang Keluar')

@section('content')
<div class="page-heading">
    <h3>Edit Barang Keluar</h3>
</div>

<div class="page-content">
    <section class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Barang Keluar</h4>
                </div>
                <div class="card-body">
                    <form  method="POST" action="{{route('outgoing.update',$outgoing->id)}}">
                        @csrf
                        @method('POST')

                        <div class="form-group">
                            <label for="product_id">Produk</label>
                            <select name="product_id" id="product_id" class="form-control">
                               <option selected disabled>-- Pilih Produk --</option>
                               @foreach ($product as $item)
                               <option value="{{$item->id}}" {{ $item->id == $outgoing->product_id ? 'selected' : '' }}>{{$item->name}} </option>
                               @endforeach
                            </select>
                            <p class="text-danger">{{$errors->first('product_id')}}</p>
                        </div>

                        <div class="form-group">
                            <label for="customer_name">Nama Customer</label>
                            <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{$outgoing->customer_name}}" placeholder="Masukan Nama Customer">
                            <p class="text-danger">{{$errors->first('customer_name')}}</p>
                        </div>

                        <div class="form-group">
                            <label for="outgoing_date">Tanggal Keluar</label>
                            <input type="date" class="form-control" id="outgoing_date" name="outgoing_date" value="{{$outgoing->outgoing_date}}" placeholder="Masukan Harga Produk">
                            <p class="text-danger">{{$errors->first('outgoing_date')}}</p>
                        </div>


                        <div class="form-group">
                            <label for="qty">Quantity</label>
                            <input type="number" class="form-control" id="qty" name="qty" value="{{$outgoing->qty}}" placeholder="Masukan Quantity">
                            <p class="text-danger">{{$errors->first('qty')}}</p>
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
