@extends('layouts.master')
@section('title','Edit User')

@section('content')
<div class="page-heading">
    <h3>Edit User</h3>
</div>

<div class="page-content">
    <section class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Edit User</h4>
                </div>
                <div class="card-body">
                    <form  method="POST" action="{{route('user.update', $user->id)}}">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" placeholder="Masukkan Password">
                            <p class="text-danger">{{$errors->first('name')}}</p>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" placeholder="Masukkan Passowrd">
                            <p class="text-danger">{{$errors->first('email')}}</p>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password"  placeholder="*****">
                            <p class="text-danger">{{$errors->first('password')}}</p>
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select name="role" id="role" class="form-control">
                                <option selected disabled>-- Pilih Role --</option>
                                <option value="Admin" {{ 'Admin' == $user->role ? 'selected' : '' }}>Admin</option>
                                <option value="Agent" {{ 'Agent' == $user->role ? 'selected' : '' }}>Agent</option>
                            </select>
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
