@extends('layouts.master')
@section('title','User')

@section('content')
<div class="page-heading">
    <h3>User</h3>
</div>

<div class="page-content">
    <section class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah User</h4>
                </div>
                <div class="card-body">
                    <form  method="POST" action="{{route('user.store')}}">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" placeholder="Masukkan Password">
                            <p class="text-danger">{{$errors->first('name')}}</p>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="Masukkan Passowrd">
                            <p class="text-danger">{{$errors->first('email')}}</p>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}" placeholder="Masukkan Passowrd">
                            <p class="text-danger">{{$errors->first('password')}}</p>
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select name="role" id="role" class="form-control">
                                <option selected disabled>-- Pilih Role --</option>
                                <option value="Admin" {{ 'Admin' == old('role') ? 'selected' : '' }}>Admin</option>
                                <option value="Agent" {{ 'Agent' == old('role') ? 'selected' : '' }}>Agent</option>
                            </select>
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
                    <h4>List User</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->role}}</td>
                                        <td>
                                            <a href="{{route('user.edit',$item->id)}}" class="btn btn-warning">Edit</a>
                                            <a href="{{url('/user/delete',$item->id)}}" class="btn btn-danger">Hapus</a>
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
