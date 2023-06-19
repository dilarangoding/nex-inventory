@extends('layouts.master')
@section('title','Edit Kategori')

@section('content')
<div class="page-heading">
    <h3>Edit Kategori</h3>
</div>

<div class="page-content">
    <section class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Kategori</h4>
                </div>
                <div class="card-body">
                    <form  method="POST" action="{{route('category.update', $category->id)}}">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$category->name}}" >
                            <p class="text-danger">{{$errors->first('name')}}</p>
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
