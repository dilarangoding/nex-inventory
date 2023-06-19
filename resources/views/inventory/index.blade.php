@extends('layouts.master')
@section('title','Barang Masuk')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Barang Masuk</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                      <a href="{{route('inventory.create')}}" class="btn btn-sm btn-primary">Tambah Baru</a>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <section class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>List Barang Masuk</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Harga Barang</th>
                                    <th>Qty</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($inventory as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->product->name}}</td>
                                    <td>{{date('d-m-Y',strtotime($item->purchase_date))}}</td>
                                    <td>Rp{{number_format($item->purchase_price,0,',','.')}}</td>
                                    <td>{{$item->qty}}</td>

                                    <td>
                                        <a href="{{route('inventory.edit',$item->id)}}" class="btn btn-warning">Edit</a>
                                        <a href="{{url('/inventory/delete',$item->id)}}" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
