@extends('layouts.master')
@section('title','Barang Keluar')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Barang Keluar</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                      <a href="{{route('outgoing.create')}}" class="btn btn-sm btn-primary">Tambah Baru</a>
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
                    <h4>List Barang Keluar</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Nama Customer</th>
                                    <th>Tanggal Keluar</th>
                                    <th>Qty</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($outgoing as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->product->name}}</td>
                                    <td>{{$item->customer_name}}</td>
                                    <td>{{date('d-m-Y',strtotime($item->purchase_date))}}</td>
                                    <td>{{$item->qty}}</td>

                                    <td>
                                        <a href="{{route('outgoing.edit',$item->id)}}" class="btn btn-warning">Edit</a>
                                        <a href="{{url('/outgoing/delete',$item->id)}}" class="btn btn-danger">Hapus</a>
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
