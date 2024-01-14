@extends('layouts.app')
@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">


        <a href="{{route('register')}}" class="btn btn-md btn-primary">ADD</a>

                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">NAMA</th>
                                <th scope="col">EMAIL</th>
                                <th scope="col">NO HP</th>
                                <th scope="col">STATUS</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $data)
                                <tr>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->email}}</td>
                                    <td>{{$data->no_hp}}</td>
                                    <td>{{$data->role}}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal" data-id="{{ $data->id }}">Edit</button>

                                    <!-- File: resources/views/data/edit.blade.php -->

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <!-- Form untuk update data -->
            <form action="{{ route('user.update', $data->id) }}" method="post">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label class="font-weight-bold">Status</label>
                        <select name="role"  class="form-control @error('no_hp') is-invalid  @enderror"
                        value="{{old('role', $data->role)}}" name="role" id="">
                    <option value="user">User</option>
                    <option value="admin">Administrator</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-md btn-primary" name="update">Update</button>
            </form>
        </div>
    </div>
</div>
</div>

                                    </td>
                                    <td><form onsubmit="return confirm('Apakah Anda Yakin')" action="{{route('user.destroy', $data->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')




                                    <button type="submit" class="btn btn-md btn-danger">Hapus</button>
                                    </form></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
