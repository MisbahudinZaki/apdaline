@extends('layouts.app')
@section('content')

<div class="container"><br>
    <div class="col-md-6 col-md-offset-3">
        <h2 class="text-center">FORM REGISTER USER</h3>
        <hr>
        @if(session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
        @endif
        <form action="{{route('actionregister')}}" method="post">
        @csrf

        <div class="form-group">
            <label for="" class="font-weight-bold">email</label>
            <input type="text" class="form-control @error('email')
                is-invalid
            @enderror" name="email" value="" id="email">
        </div>

        <div class="form-group">
            <label for="" class="font-weight-bold">name</label>
            <input type="text" name="name" class="form-control @error('name')
            is-invalid
        @enderror" id="name">
        </div>

        <div class="form-group">
            <label for="" class="font-weight-bold">password</label>
            <input type="password" name="password" class="form-control" class="form-control @error('password')
            is-invalid
        @enderror" >
        </div>

        <div class="form-group">
            <label for="" class="font-weight-bold">role</label>
            <select name="role" class="form-control @error('role')
            is-invalid
        @enderror" id="">
                <option value="user">User</option>
                <option value="admin">Administrator</option>
            </select>

        <hr>
            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-user"></i> Register</button>


        </form>
    </div>
</div>

@endsection
