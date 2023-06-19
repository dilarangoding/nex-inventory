@extends('layouts.master')
@section('title','Kategori')

@section('content')
<div class="page-heading">
    <h3>Kategori</h3>
</div>

<div class="page-content">
    <section class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Kategori</h4>
                </div>
                <div class="card-body">
                    <form  method="POST" action="{{route('category.store')}}">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" >
                            <p class="text-danger">{{$errors->first('name')}}</p>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>List Kategori</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>
                                            <a href="{{route('category.edit',$item->id)}}" class="btn btn-warning">Edit</a>
                                            <a href="{{url('/category/delete',$item->id)}}" class="btn btn-danger">Hapus</a>
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
